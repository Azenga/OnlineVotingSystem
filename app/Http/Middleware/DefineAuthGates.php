<?php

namespace App\Http\Middleware;

use Closure;
use App\Permission;
use Illuminate\Support\Facades\Gate;

class DefineAuthGates
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

        $permissions = Permission::pluck('title')->toArray();

        foreach ($permissions as $permission) {

            Gate::define($permission, function($user) use($permission){
                return in_array($permission, $user->role->permissions->pluck('title')->toArray());
            });
        }

        return $next($request);


    }
}
