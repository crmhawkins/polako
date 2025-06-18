<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Helper para activar elementos de menú basados en la ruta actual
        view()->share('isActive', function ($routePattern) {
            return Route::currentRouteNamed($routePattern) ? 'active' : '';
        });

        view()->composer('*', function ($view) {
            if (!session()->has('company_id')) {
                session(['company_id' => 1]); // o mostrar una vista de selección
            }
        });
    }
}
