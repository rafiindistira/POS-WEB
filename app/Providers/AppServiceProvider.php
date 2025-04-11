<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Register komponen blade manual
        Blade::component('components.sidebar', 'sidebar');
        Blade::component('components.topbar', 'topbar');
        Blade::component('components.layouts.dashboard', 'layouts.dashboard');
    }
}
