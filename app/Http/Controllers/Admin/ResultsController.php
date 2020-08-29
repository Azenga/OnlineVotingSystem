<?php

namespace App\Http\Controllers\Admin;

use App\Selection;
use App\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $results = collect([]);

        //Get the position
        $positionId = $request->position;
        
        //Get the Location
        $locationId = $request->location;

        //Filter The Candidates
        if(!is_null($positionId) &&  !is_null($locationId)){

            $results = Selection::with('candidate.user')
                ->selectRaw('COUNT(selections.id) as votes, candidature_id')
                ->where('position_id', $positionId)
                ->where('location_id', $locationId)
                ->groupBy('candidature_id')
                ->get();
                
        }

        //Return a view

        return view('admin.results.index', compact('results'));
    }
}
