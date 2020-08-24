<?php

namespace App\Http\Controllers\Admin;

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
        $candidates = Candidature::all();

        //Get the position

        //Get the Location

        //Filter The Candidates

        //Return a view

        return view('admin.results.index', compact('candidates'));
    }
}
