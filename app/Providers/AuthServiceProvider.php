<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('auth', function () {
            return Auth::check();
        });

        Gate::define('admin-only', function ($user){
            if($user->nivel_user == 0 && $user->status_user == 1){
                return true;
            }
            return false;
        });

        Gate::define('gerencia', function ($user){
            if($user->nivel_user <= 1 && $user->status_user == 1){
                return true;
            }
            return false;
        });
    }
}
