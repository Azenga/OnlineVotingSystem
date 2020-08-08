<?php

namespace App\Http\Controllers\Officer;

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
    public function index(Request $request)
    {
        Gate::authorize('view_users_page');
        
        $users = User::query()->ward($request->user()->ward)->get();

        return view('officer.users.index', compact('users'));
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

        return view('officer.users.create', compact('roles', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
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

        return redirect()->route('officer.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('view_single_user_page');

        return view('officer.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('view_edit_user_page');

        $roles = Role::all();
        $wards = Ward::all();

        return view('officer.users.edit', compact('user', 'roles', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update_user');

        $user->update($request->validated());

        return redirect()->route('officer.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete_user');
        
        $user->delete();
        
        return redirect()->route('officer.users.index');
    }
}
