<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TufaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $data = $request->validate([
            'code' => ['required', 'numeric']
        ]);

        if($data['code'] == $request->user()->code){

            if($request->user()->code_expiry->addMinutes(5) < now())
                throw ValidationException::withExceptions(['code' => 'Code expired']);
                
            $request->user()->update([
                'code_expiry' => Carbon::now()->addMinutes(10)
            ]);

            return redirect()->route('home');

        }
        
        throw ValidationException::withMessages([
            'code' => 'Invalid Verification Code'
        ]);
        
    }
}
