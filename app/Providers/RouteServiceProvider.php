<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public static function redirectTo()
    {
        // Ambil user yang sedang login
        $user = auth()->user();
    
        // Kalau user adalah owner, redirect ke dashboard-owner
        if ($user->hasRole('owner')) {
            return '/dashboard-owner';
        }
        // Kalau user adalah karyawan, redirect ke dashboard-karyawan
        elseif ($user->hasRole('karyawan')) {
            return '/dashboard-karyawan';
        }
    
        // Kalau tidak punya role apapun, redirect ke halaman root
        return '/';
    }

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
