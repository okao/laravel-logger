<?php

namespace Okao\LaravelLogger;

use Illuminate\Support\ServiceProvider;
use Okao\LaravelLogger\Middleware\LaravelLoggerMiddleware;

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
//         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        //publish middleware file
//        $this->publishConfig();
//        $this->publishMigrations();
//        if (!$this->migrationHasAlreadyBeenPublished()) {
//            // Publish migration
//            $timestamp = date('Y_m_d_His', time());
//            $this->publishes([
//                __DIR__ . "/Database/migrations/2019_10_15_175246_create_okao_logs_table.php"
//                => database_path("/migrations/{$timestamp}_create_okao_logs_table.php"),
//            ], 'migrations');
//        }

        // Publish a config file
//        $this->publishes([
//            __DIR__ . '/../config/laravellogger.php' => config_path('laravellogger.php'),
//        ], 'config');

//        if (!$this->modelHasAlreadyBeenPublished()) {
//            // Publish model
////            $timestamp = date('Y_m_d_His', time());
//            $this->publishes([
//                __DIR__ . "/Models/OkaoLog.php"
//                => app_path("OkaoLog.php"),
//            ], 'model');
//        }

//        if (!$this->middlewareHasAlreadyBeenPublished()) {
//            // Publish middleware
////            $timestamp = date('Y_m_d_His', time());
//            $this->publishes([
//                __DIR__ . "/Middleware/LaravelLoggerMiddleware.php"
//                => app_path("/Http/Middleware/LaravelLoggerMiddleware.php"),
//            ], 'middleware');
//        }


//        $router->aliasMiddleware('laravel_logger_middleware', LaravelLoggerMiddleware::class);

        // Publishing is only necessary when using the CLI.
//        if ($this->app->runningInConsole()) {
//            $this->bootForConsole();
//        }

        $this->publishConfig();
        $this->publishModel();
        $this->publishMigrations();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/../config/laravellogger.php', 'laravellogger');

        // Register the service the package provides.
//        $this->app->singleton('laravellogger', function ($app) {
//            return new LaravelLogger;
//        });
//        $this->app->bind('LaravelLogger', function () {
//            $request = app(\Illuminate\Http\Request::class);
//
//            return app(LaravelLogger::class, [$request->foo]);
//        });

//        $this->app->make("");

        $this->mergeConfig();
    }

    private function mergeConfig()
    {
        $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'laravellogger');
    }

    private function getConfigPath()
    {
        return __DIR__ . '/../config/laravellogger.php';
    }

    private function getModelPath()
    {
        return __DIR__ . '/Models/OkaoLog.php';
    }

    private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('laravellogger.php')], 'config');
    }

    private function publishModel()
    {
        $path = $this->getModelPath();
        $this->publishes([$path => app_path('OkaoLog.php')], 'model');
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/Database/migrations/';
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
//        $this->publishes([
//            __DIR__.'/../config/laravellogger.php' => config_path('laravellogger.php'),
//        ], 'laravellogger.config');

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

    /**
     * @return bool
     */
    protected function migrationHasAlreadyBeenPublished()
    {
        $files = glob(database_path('/migrations/*_create_okao_logs_table.php'));
        return count($files) > 0;
    }

    /**
     * @return bool
     */
    protected function modelHasAlreadyBeenPublished()
    {
        $files = glob(app_path('OkaoLog.php'));
        return count($files) > 0;
    }

    /**
     * @return bool
     */
    protected function middlewareHasAlreadyBeenPublished()
    {
        $files = glob(app_path('/Http/Middleware/LaravelLoggerMiddleware.php'));
        return count($files) > 0;
    }

}
