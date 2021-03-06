<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;

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

        Passport::routes();

        $this->authorization();
    }

    public function authorization()
    {
        if (!app()->runningInConsole()) {

            Gate::define('owner', function($user, $data){
                return $user->id == $data->user_id;
            });

            $permissions = Permission::with('profiles')->get();
            foreach ( $permissions as $permission ) {
                Gate::define($permission->name, function($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
            
            Gate::before(function($user, $ability){
                if( $user->isSuperAdmin() ) {
                    return true;
                }
            });
        }
    }
}
