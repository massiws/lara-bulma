<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('browse-roles')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $roles = Role::paginate($this->perPage);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('create-roles')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $permissions = Permission::get()->sortBy('name')->pluck('name', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        if (! Gate::allows('create-roles')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $role =  Role::create($request->all());
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index')
            ->with(['status' => __('general.item_created'), 'style' => 'success']);
    }

    /**
     * Display the specified role.
     *
     * @param  object $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (! Gate::allows('view-roles', $role)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $users = $role->users()->paginate(10);

        return view('admin.roles.show', compact('role', 'users'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  object $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (! Gate::allows('edit-roles', $role)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $permissions = Permission::get()->pluck('name', 'id')->sort();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if (! Gate::allows('edit-roles', $role)) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        $response = $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')
            ->with(['status' => __('general.item_updated'), 'style' => 'success']);
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (! Gate::allows('delete-roles')) {
            return redirect()->back()->with(['status' => __('auth.unauthorized'), 'style' => 'warning']);
        }

        if ($role->delete()) {
            $response = ['status' => __('general.item_deleted'), 'style' => 'success'];
        } else {
            $response = ['status' => __('general.error_on_delete'), 'style' => 'warning'];
        }

        return redirect()->route('roles.index')->with($response);
    }
}
