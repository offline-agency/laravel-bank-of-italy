<?php

namespace OfflineAgency\LaravelBankOfItaly;

use Illuminate\Support\ServiceProvider;

class LaravelBankOfItalyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-bank-of-italy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-bank-of-italy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-bank-of-italy.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-bank-of-italy'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-bank-of-italy'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-bank-of-italy'),
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-bank-of-italy');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-bank-of-italy', function () {
            return new LaravelBankOfItaly;
        });
    }
}
