<?php

namespace App\Http\Controllers;

use App\Level;
use App\Position;
use App\Candidature;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions= Position::all(['id', 'title']);

        $levels= Level::all(['id', 'title']);
        
        $candidates = Candidature::with(['user.profile', 'position'])->get();
        
        return view('candidates.index', compact('candidates', 'positions', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidature $candidature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
}
