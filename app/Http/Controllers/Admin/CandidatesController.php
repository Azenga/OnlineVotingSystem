<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Position;
use App\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('view_candidates_page');

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
        Gate::authorize('view_create_candidate_page');
        
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
        Gate::authorize('store_candidate');

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
        Gate::authorize('view_single_candidate_page');

        $user = User::with(['candidature.position.level'])->findOrFail($id);

        return view('admin.candidates.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('view_edit_candidate_page');

        $user = User::with(['candidature'])->findOrFail($id);
        $positions = Position::all();

        return view('admin.candidates.edit', compact('user',  'positions'));
        
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
        Gate::authorize('update_candidate');

        $data = $request->validate([
            'position_id' => ['bail', 'required', 'numeric'],
            'party' => ['string'],
            'incumbent' => [],
            'running_mate_id' => ['numeric']
        ]);
        
        User::findOrFail($id)->candidature->update(
            array_merge(
                $data,
                ['incumbent' => array_key_exists('incumbent', $data) ? $data['incumbent'] == 'on' : false],
            )
        );

        return redirect()->route('admin.candidates.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_candidate');
        
        $user = User::findOrFail($id);

        $user->candidature->delete();

        $user->update([
            'role_id' => 1
        ]);

        return redirect()->route('admin.candidates.index');
    }
}
