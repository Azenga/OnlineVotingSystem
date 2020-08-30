<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

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


        foreach (Position::pluck('id')->toArray() as $value) {
            $results = $results
                ->concat(
                    $request->user()
                        ->getCandidatesWithVotesAtPosition($value)
                );
        }

        return view('results.index', compact('results'));
    }
}
