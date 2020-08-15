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
        dump(session('positions'));
        dump(session('selections'));

        $positions = Position::all(['id', 'title']);
        
        if($request->method() === "GET"){

            $positionId = $request->position;

            if(is_null($positionId))
                $candidatures = $this->getCandidates();
            else 
                $candidatures = $this->getCandidates($positionId);

            return view('users.vote', compact('positions', 'candidatures'));

        }

        if($request->method() === "POST")
        {
            $request->validate([
                'candidature_id' => ['required', 'numeric']
            ]);

            $positionId = Candidature::findOrFail($request->candidature_id)->position_id;

            $candidatureId = $request->candidature_id;

            $this->updateVote($positionId, $candidatureId);

            if(
                (count(session('positions', [])) === $positions->count())
                && 
                (count(session('positions', [])) === count(session('selections', [])))
            ){
                
                return redirect()->route('vote.confirm');

            }else{

                $candidatures = $this->getCandidates(++$positionId);

                return view('users.vote', compact('positions', 'candidatures'));
            }
        }

    }

    private function getCandidates(int $positionId = 1)
    {
        return Candidature::with('user')
            ->where('position_id', $positionId)
            ->get();
    }

    private function updateVote($positionId, $candidatureId)
    {
        $positions = session('positions', []);
        $selections = session('selections', []);
        
        if(in_array($positionId, $positions))
        {
            $selections[array_search($positionId, $positions, true)] = $candidatureId;
        }
        
        else
        {
            array_push($positions, $positionId);
            array_push($selections, $candidatureId);
        }

        request()->session()->put('positions', $positions);
        request()->session()->put('selections', $selections);

    }

}
