<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCandidateRequest;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get candidates
        $role = Role::findOrFail(2);

        $users = User::with(['candidature'])->role($role)->get();

        return view('admin.candidates.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\StoreCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidateRequest $request)
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                [
                    'role_id' => 2,
                    'password' => Hash::make('password'),
                ]
            )
        );

        $candidature = Candidature::create([
            'user_id' => $user->id,
            'position_id' => $request->validated()['position_id']
        ]);
        
        return redirect()->route('admin.candidates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
