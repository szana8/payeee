<?php

namespace szana8\PayEEE;

use Illuminate\Support\ServiceProvider;
use szana8\PayEEE\Console\InstallPayeee;
use szana8\PayEEE\Events\PaymentManagerWasCalled;
use szana8\PayEEE\Managers\Contracts\Factory;
use szana8\PayEEE\Managers\PaymentManager;
use szana8\PayEEE\View\Components\AppLayout;

class PayEEEServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/../stubs/default/resources/views', 'payeee');

        $this->loadViewComponentsAs('payeee', [
            AppLayout::class
        ]);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->app->booted(function () {
            $paymentWasCalled = app(PaymentManagerWasCalled::class);

            event($paymentWasCalled);
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payeee.php', 'payeee');

        // Register the service the package provides.
        $this->app->singleton(Factory::class, function ($app) {
            return new PaymentManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [InstallPayeee::class, Factory::class];
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
            __DIR__.'/../config/payeee.php' => config_path('payeee.php'),
        ], 'payeee.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/szana8'),
        ], 'payeee.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/szana8'),
        ], 'payeee.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/szana8'),
        ], 'payeee.views');*/

        // Registering package commands.
        $this->commands([
            InstallPayeee::class,
        ]);
    }
}
