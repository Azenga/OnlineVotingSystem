<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view_officers_page');

        $users = User::with('working.station')->role(Role::findOrFail(3))->get();

        return view('admin.officers.index', compact('users'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_officer');
        
        $user = User::findOrFail($id);

        if(!is_null($user->working)) $user->working->delete();

        $user->update(['role_id' => 1]);

        return redirect()->route('admin.officers.index');
    }
}
