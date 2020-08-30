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
    public function index(Request $request)
    {

        //dd($request->all());

        //Get request positions or an empty array
        $positionsIds = is_null($request->positions) ? [] : $request->positions;

        //Get request levels or an empty array
        $levelsIds = is_null($request->levels) ? [] : $request->levels;

        //Get positions ids based on the levels
        $levelPositions = Position::whereIn('level_id', $levelsIds)->pluck('id')->toArray();

        //Merge level positions with the select positions
        $positionsIds = array_merge($positionsIds, $levelPositions);

        $positions= Position::all(['id', 'title']);

        $levels= Level::all(['id', 'title']);

        $query = Candidature::query();
        
        //Filter candidates by positions if passed
        if(!is_null($positionsIds) && count($positionsIds))
            $query->whereIn('position_id', $positionsIds);

        $candidates = $query->with(['user.profile', 'position'])->get();
        
        return view('candidates.index', compact('candidates', 'positions', 'levels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function show(int $candidature)
    {
        $candidate = Candidature::with(['user.profile', 'position'])->findOrFail($candidature);

        return view('candidates.show', compact('candidate'));
    }

}
