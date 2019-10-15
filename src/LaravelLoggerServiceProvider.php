<?php

namespace Okao\LaravelLogger;

use Illuminate\Support\ServiceProvider;

class LaravelLoggerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'okao');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'okao');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravellogger.php', 'laravellogger');

        // Register the service the package provides.
        $this->app->singleton('laravellogger', function ($app) {
            return new LaravelLogger;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravellogger'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravellogger.php' => config_path('laravellogger.php'),
        ], 'laravellogger.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/okao'),
        ], 'laravellogger.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/okao'),
        ], 'laravellogger.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/okao'),
        ], 'laravellogger.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
