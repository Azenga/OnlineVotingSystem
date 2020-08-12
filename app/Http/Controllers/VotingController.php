<?php

namespace App\Http\Controllers;

use App\Position;
use App\Candidature;
use Illuminate\Http\Request;

class VotingController extends Controller
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
        $candidates = [];

        $positions = Position::all(['id', 'title']);
        
        if($request->method() === "GET"){

            $candidatures = $this->getCandidates();

            return view('users.vote', compact('positions', 'candidatures'));

        }


        


    }

    private function getCandidates()
    {
        $vote = session()->pull('vote', []);
        
        if(!session()->has('vote'))
        {
            $vote = [
                'selection' => [],
                'current_position' => 1,
            ];

            session()->put('vote', $vote);

            return Candidature::with('user')->where('position_id', 1)->get();
        }

    }

}
