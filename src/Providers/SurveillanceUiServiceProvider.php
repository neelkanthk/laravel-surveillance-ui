<?php

namespace Neelkanth\Laravel\SurveillanceUi\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SurveillanceUiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            realpath(__DIR__ . '/../../config/surveillance-ui.php'),
            'surveillance-ui'
        );
    }

    public function boot()
    {
        $this->registerRoutes();
        $this->loadTranslationsFrom(realpath(__DIR__.'/../../resources/lang'), 'surveillance-ui');
        $this->loadViewsFrom(realpath(__DIR__ . '/../../resources/views'), 'surveillance-ui');

        if ($this->app->runningInConsole()) {
            // Publish views
            //php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="views"
            $this->publishes([
                realpath(__DIR__ . '/../../resources/views') => resource_path('views/vendor/surveillance-ui'),
            ], 'views');

            //Publish config
            //php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="config"
            $this->publishes([
                realpath(__DIR__ . '/../../config/surveillance-ui.php') => config_path('surveillance-ui.php'),
            ], 'config');

            // Publish assets
            //php artisan vendor:publish --provider="Neelkanth\Laravel\SurveillanceUi\Providers\SurveillanceUiServiceProvider" --tag="assets"
            $this->publishes([
                realpath(__DIR__ . '/../../resources/assets') => public_path('surveillance-ui'),
            ], 'assets');
        }
    }

    /**
     * Register package routes with application
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Customize route prefix and middleware
     *
     * @return void
     */
    protected function routeConfiguration()
    {
        return [
            'prefix' => config('surveillance-ui.prefix'),
            'middleware' => config('surveillance-ui.middleware'),
        ];
    }
}
