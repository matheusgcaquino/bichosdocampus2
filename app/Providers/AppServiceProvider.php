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

        Blade::if('admin', function (){
            if (auth()->user() && auth()->user()->status_user && auth()->user()->nivel_user == 0) {
                return app()->environment();
            }
        });

        Blade::if('gerencia', function () {
            if (auth()->user() && auth()->user()->status_user && auth()->user()->nivel_user <= 1) {
                return app()->environment();
            }
        });

        Blade::if('parceiro-only', function () {
            if (auth()->user() && auth()->user()->status_user && auth()->user()->nivel_user == 2) {
                return app()->environment();
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
