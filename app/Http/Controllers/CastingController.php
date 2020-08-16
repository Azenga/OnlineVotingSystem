<?php

namespace App\Http\Controllers;

use App\Position;
use App\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CastingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        Gate::authorize('can-vote');
        
        $positions = Position::all(['id', 'title']);

        if(count(session('selections', [])) < $positions->count())
            return redirect()->route('vote');
        

        if(count(session('selections', [])) != count(session('positions', [])))
            return redirect()->route('vote');
        
        if($request->method() === 'GET'){

            $candidatures = Candidature::with(['user', 'position'])
                ->whereIn('id', session('selections'))
                ->orderBy('position_id')
                ->get();
    
            return view('users.confirm', compact('candidatures'));
        }

        if($request->method() === 'POST'){

            //Creating a vote
            $vote = $request->user()->vote()->create();

            for ($count=0; $count < count(session('positions')); $count++) {

                $positionId = session('positions')[$count];
                
                $candidatureId = session('selections')[$count];

                $position = Position::findOrFail($positionId);

                $candidature = Candidature::findOrFail($candidatureId);

                $locationId = 0;

                switch ($position->level_id) {

                    case 1:
                        $locationId = $request->user()->ward->constituency->county->country_id;
                        break;

                    
                    case 2:
                        $locationId = $request->user()->ward->constituency->county_id;
                        break;
                        
                    
                    case 3:
                        $locationId = $request->user()->ward->constituency_id;
                        break;
                        
                    case 4:
                        $locationId = $request->user()->ward_id;
                        break;                           
                    
                    default:
                        #Throw an exception
                        throw new \Exception("No such level in the databases");
                        break;
                }

                $vote->selections()->create([
                    'position_id' => $positionId,
                    'location_id' => $locationId,
                    'candidature_id' => $candidatureId
                ]);
            }

            $request->session()->forget('positions');
            $request->session()->forget('selections');
        
            return redirect()->route('home');
            
        }
        
        return redirect()->route('vote');
    }
}
