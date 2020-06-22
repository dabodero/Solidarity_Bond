<?php

namespace App\Providers;

use App\Http\Controllers\API\RoleController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();
        Carbon::setLocale(config('app.locale'));

        Blade::if('flash', function($variable) {
            return Session::has($variable);
        });

        Blade::if('client', function(){
            $ID_Role = Auth::user()->ID_Role;
            return ($ID_Role==RoleController::getNumeroRoleClient() || $ID_Role==RoleController::getNumeroRoleAdmin());
        });

        Blade::if('fablab', function(){
            $ID_Role = Auth::user()->ID_Role;
            return ($ID_Role==RoleController::getNumeroRoleFablab() || $ID_Role==RoleController::getNumeroRoleAdmin());
        });

        Blade::if('admin', function(){
            return (Auth::user()->ID_Role==RoleController::getNumeroRoleAdmin());
        });

    }
}
