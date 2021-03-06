<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpsertRoleRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view_roles_page');
        
        $roles = Role::with('permissions')->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('view_create_role_page');

        $permissions = Permission::all();
        
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\UpsertRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertRoleRequest $request)
    {
        Gate::authorize('store_role');

        $role = Role::create($request->validated());

        $role->permissions()->sync($request->validated()['permissions_ids']);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        Gate::authorize('view_single_role_page');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('view_edit_role_page');

        $permissions = Permission::all();

        $role->load('permissions');
        
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\UpsertRoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertRoleRequest $request, Role $role)
    {
        Gate::authorize('update_role');
        //dd($request->validated()['permissions_ids']);

        $role->update($request->validated());

        $role->permissions()->sync($request->validated()['permissions_ids']);

        return redirect()->route('admin.roles.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('delete_role');

        $role->delete();
        
        return redirect()->route('admin.roles.index');
    }
}
