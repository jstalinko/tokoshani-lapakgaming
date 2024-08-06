<?php

namespace Jstalinko\TokoshaniLapakgaming;

use Illuminate\Support\ServiceProvider;
use Jstalinko\TokoshaniLapakgaming\TokoshaniLapakgaming;

class TokoshaniLapakgamingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tokoshani-lapakgaming');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tokoshani-lapakgaming');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('tokoshani-lapakgaming.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tokoshani-lapakgaming'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/tokoshani-lapakgaming'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/tokoshani-lapakgaming'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tokoshani-lapakgaming');

        // Register the main class to use with the facade
        $this->app->singleton('tokoshani-lapakgaming', function () {
            return new TokoshaniLapakgaming;
        });
    }
}
