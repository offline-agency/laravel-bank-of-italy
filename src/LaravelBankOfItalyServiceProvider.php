<?php

namespace OfflineAgency\LaravelBankOfItaly;

use Illuminate\Support\ServiceProvider;

class LaravelBankOfItalyServiceProvider extends ServiceProvider
{
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/bank-of-italy.php' => config_path('bank-of-italy.php'),
            ], 'config');
        }
    }

    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/bank-of-italy.php',
            'bank-of-italy'
        );

        // Register the main class to use with the facade
        $this->app->singleton('laravel-bank-of-italy', function () {
            return new LaravelBankOfItaly;
        });
    }
}
