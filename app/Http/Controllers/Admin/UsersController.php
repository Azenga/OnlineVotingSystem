<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view_users_page');
        
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('view_create_user_page');

        $roles = Role::all();
        $wards = Ward::all();

        return view('admin.users.create', compact('roles', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('store_user');

        User::create(
            array_merge(
                $request->validated(),
                ['password' => Hash::make('password')],
            )
        );

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('view_single_user_page');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('view_edit_user_page');

        $roles = Role::all();
        $wards = Ward::all();

        return view('admin.users.edit', compact('user', 'roles', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\UpdateUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update_user');

        $user->update($request->validated());

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete_user');
        
        $user->delete();
        
        return redirect()->route('admin.users.index');
    }
}
