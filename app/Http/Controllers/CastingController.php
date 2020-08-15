<?php

namespace App\Http\Controllers;

use App\Candidature;
use Illuminate\Http\Request;

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
        $candidatures = Candidature::with(['user', 'position'])
            ->whereIn('id', session('selections'))
            ->orderBy('position_id')
            ->get();

        return view('users.confirm', compact('candidatures'));
    }
}
