<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('browse-users')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $users = User::paginate($this->perPage);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('create-users')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $user = new User;
        /*
         * Roles selectable by normal user can't be Admin-roles, so we display
         * only non-Admin roles in UI!
         */
        $roles = $this->filterRoles();
        $selectedRole = env('DEFAULT_ROLE', null);

        return view('admin.users.create', compact('user', 'roles', 'selectedRole'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if (! Gate::allows('create-users')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        // Store the new User (and Role).
        $user =  User::create($request->all());
        // Store avatar if any.
        $err = $this->updateAvatar($request, $user) ? '' : ', but there was an error saving avatar image.';

        return redirect()->route('users.show', [$user->id])
            ->with(['status' => __('general.item_created'). $err, 'style' => 'success']);
    }

    /**
     * Display the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (! Gate::allows('view-users', $user)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('edit-users', $user)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $roles = $this->filterRoles();
        $selectedRole = !empty($user->role_id) ? $user->role_id : env('DEFAULT_ROLE', null);

        return view('admin.users.edit', compact('user', 'roles', 'selectedRole'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (! Gate::allows('edit-users', $user)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        // Update User and Role.
        $user->update($request->all());
        // Store avatar if any.
        $err = $this->updateAvatar($request, $user) ? '' : ' (but there was an error saving avatar image)';

        return redirect()->route('users.show', [$user->id])
            ->with(['status' => __('general.item_updated') . $err, 'style' => 'success']);
    }

    /**
     * Store the avatar file and update the user.
     *
     * @param  Request $request
     * @param  User    $user
     *
     * @return Boolean
     */
    private function updateAvatar(Request $request, User $user)
    {
        $avatar = $request->avatar;

        if (empty($avatar)) {
            return false;
        }

        if (! $avatar->isValid()) {
            // Error uploading avatar.
            Log::error('An error occours uploading avatar file: ' . $avatar->getError());
            return false;
        }


        // Build file name.
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        try {
            // Check avatar folder existence.
            File::exists(public_path(env('AVATAR_FOLDER'))) or
            File::makeDirectory(public_path(env('AVATAR_FOLDER')));
            // Save uploade image on filesystem.
            Image::make($avatar)->fit(300, 300)->save(public_path(env('AVATAR_FOLDER') . "/$filename"));
        } catch (Exception $e) {
            return false;
        }

        // Update user model.
        $user->avatar = $filename;
        $user->save();

        return true;
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('delete-users')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        if ($user->delete()) {
            $response = ['status' => __('general.item_deleted'), 'style' => 'success'];
        } else {
            $response = ['status' => __('general.error_on_delete'), 'style' => 'warning'];
        }

        return redirect()->route('users.index')->with($response);
    }

    /**
     * Remove all Admin-role(s) from selectable roles.
     * Only role(s) defined in .env file are allowed to create Admin-users!
     *
     * @return Illuminate\Support\Collection
     */
    private function filterRoles()
    {
        // Get all roles from database.
        $roles = Role::get()->pluck('name', 'id')->sort();

        // If current user is not Admin, remove all Admin roles from returned values.
        if (! Auth::user()->isAdmin()) {
            $admin_roles = explode(',', env('ADMIN_ROLES', 1));
            foreach ($admin_roles as $key => $id) {
                $roles->pull($id);
            }
        }

        return $roles;
    }
}
