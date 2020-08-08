<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Define gates

        if(Schema::hasTable('permissions')){

            $permissions = Permission::pluck('title')->toArray();
    
            foreach ($permissions as $permission) {
    
                Gate::define($permission, function($user) use($permission){
                    return in_array($permission, $user->role->permissions->pluck('title')->toArray());
                });
            }
        }

        //Extra Gates

        Gate::define('view-admin-dashboard', function($user){
            return $user->role_id == 5 
                ? Response::allow()
                : Response::deny('You must be a super administrator');
        });

        Gate::define('view-officer-dashboard', function($user){
            return $user->role_id == 3 
                ? Response::allow()
                : Response::deny('You must be an officer');
        });

    }
}
