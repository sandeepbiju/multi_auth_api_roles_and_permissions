<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

// class RouteServiceProvider extends ServiceProvider
// {

//     public const HOME = '/home';
//     protected $namespace = 'App\Http\Controllers';

//     public function boot(): void
//     {
//         RateLimiter::for('api', function (Request $request) {
//             return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
//         });

//         $this->routes(function () {
//             Route::middleware('api')
//                 ->prefix('api')
//                 ->group(base_path('routes/api.php'));

//             Route::middleware('web')
//                 ->group(base_path('routes/web.php'));

//             Route::middleware('admin')
//                 ->prefix('admin')
//                 ->group(base_path('routes/admin.php'));

//             Route::middleware('super-admin')
//                 ->prefix('super-admin')
//                 ->group(base_path('routes/super-admin.php'));
//         });
//     }
// }

class RouteServiceProvider extends ServiceProvider

{
    public const HOME = '/login';
    protected $namespace = 'App\Http\Controllers';
    public function boot()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapManagerRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('super-admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/super-admin.php'));
    }
    protected function mapManagerRoutes()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
}
