<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('manage-users', function($user){
            return count(array_intersect(["SUPERADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-categories', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-products', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-vouchers', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-orders', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-edit-orders', function($user){
            return count(array_intersect(["SUPERADMIN"], json_decode($user->roles)));
        });

        Gate::define('change-password', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });

        Gate::define('manage-banner', function($user){
            return count(array_intersect(["SUPERADMIN", "ADMIN"], json_decode($user->roles)));
        });
    }
}
