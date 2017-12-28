<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('browse-permissions')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $permissions = Permission::orderBy('name')->paginate($this->perPage);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('create-permissions')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $roles = Role::get()->sortBy('name')->pluck('name', 'id');

        return view('admin.permissions.create', compact('roles'));
    }

    /**
     * Store a newly created permission in storage.
     *
     * @param  App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        if (! Gate::allows('create-permissions')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $permission =  Permission::create($request->all());
        $permission->roles()->attach($request->roles);

        return redirect()->route('permissions.index')
            ->with(['status' => __('general.item_created'), 'style' => 'success']);
    }

    /**
     * Display the specified permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        if (! Gate::allows('view-permissions', $permission)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (! Gate::allows('edit-permissions', $permission)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $roles = Role::get()->pluck('name', 'id')->sort();

        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified permission in storage.
     *
     * @param  App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if (! Gate::allows('edit-permissions', $permission)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $response = $permission->update($request->all());
        $permission->roles()->sync($request->roles);

        return redirect()->route('permissions.index')
            ->with(['status' => __('general.item_updated'), 'style' => 'success']);
    }

    /**
     * Remove the specified permission from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (! Gate::allows('delete-permissions')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        if ($permission->delete()) {
            $response = ['status' => __('general.item_deleted'), 'style' => 'success'];
        } else {
            $response = ['status' => __('general.error_on_delete'), 'style' => 'warning'];
        }

        return redirect()->route('permissions.index')->with($response);
    }
}
