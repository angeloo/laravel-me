<?php

namespace Angeloo\Me;

use Illuminate\Support\ServiceProvider;
use Angeloo\Me\Http\Controllers\Api\MeController;
use Illuminate\Support\Facades\Route;

class MeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this
            ->registerPublishables()
            ->registerRoutes();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/me.php', 'me');
    }

    public function registerPublishables(): self
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/me.php' => config_path('me.php'),
            ], 'config');
        }

        return $this;
    }

    protected function registerRoutes(): self
    {
        Route::macro('meApi', function (string $prefix) {
            Route::prefix($prefix)->group(function () {
                Route::get('/', MeController::class);
            });
        });

        return $this;
    }
}
