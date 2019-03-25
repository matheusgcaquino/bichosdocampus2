<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('admin', function ($environment){
            if (auth()->user() && auth()->user()->status_user && auth()->user()->nivel_user = 0) {
                return app()->environment($environment);
            }
        });

        Blade::if('gerencia', function ($environment) {
            if (auth()->user() && auth()->user()->status_user && auth()->user()->nivel_user <= 1) {
                return app()->environment($environment);
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
