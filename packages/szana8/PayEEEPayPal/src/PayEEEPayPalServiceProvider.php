<?php

namespace szana8\PayEEEPayPal;

use Illuminate\Support\ServiceProvider;
use szana8\PayEEE\Facades\PayEEE;
use szana8\PayEEE\Managers\PaymentManager;

class PayEEEPayPalServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');

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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payeeepaypal.php', 'payeeepaypal');
        //$this->app->register(EventServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton('payeeepaypal', function ($app) {
            return new PayEEEPayPal;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['payeeepaypal'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/payeeepaypal.php' => config_path('payeeepaypal.php'),
        ], 'payeeepaypal.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/szana8'),
        ], 'payeeepaypal.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/szana8'),
        ], 'payeeepaypal.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/szana8'),
        ], 'payeeepaypal.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
