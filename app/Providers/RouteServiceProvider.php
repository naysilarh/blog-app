<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/posts';  // fallback jika tidak ada nama route

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Optional: method helper untuk redirect ke route bernama posts.index
     */

public static function redirectTo()
{
    try {
        return route('posts.index'); // redirect ke route posts.index
    } catch (\Throwable $e) {
        return self::HOME; // fallback kalau route belum ada
    }
    }
}