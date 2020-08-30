<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Notifications\VerifyAccount;

class TufaVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->user()->code_expiry > Carbon::now()){
            return $next($request);
        }

        $request->user()->update([
            'code' => mt_rand(10000, 99999)
        ]);

        //Send the notification
        $request->user()->notify(new VerifyAccount($request->user()));
        
        return redirect()->route('verification');

    }
}
