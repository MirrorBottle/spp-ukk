<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function ($role) {
            if(Auth::guard('web')->check()) {
                if(strcmp(Auth::user()->role->name, 'admin') === 0) {
                    return true;
                } else {
                    return $condition = strcmp(Auth::user()->role->name , $role) === 0;
                }
            } else {
                return false;
            }
        });

        Blade::if('student', function () {
            return Auth::guard('students')->check();
        });
    }
}
