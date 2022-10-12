<?php

namespace szana8\PayEEE\Console;

trait InstallsBladeStack
{
    /**
     * Install the Blade stack.
     *
     * @return void
     */
    protected function installBladeStack()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    '@tailwindcss/forms' => '^0.5.2',
                    'alpinejs' => '^3.4.2',
                    'autoprefixer' => '^10.4.2',
                    'postcss' => '^8.4.6',
                    'tailwindcss' => '^3.1.0',
                ] + $packages;
        });

        // Tailwind / Vite...
        copy(__DIR__.'/../../stubs/default/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/default/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__.'/../../stubs/default/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../stubs/default/resources/css/payeee_app.css', resource_path('css/payeee_app.css'));
        copy(__DIR__ . '/../../stubs/default/resources/js/payeee_app.js', resource_path('js/payeee_app.js'));

        $this->runCommands(['npm install', 'npm run build']);

        $this->line('');
        $this->components->info('Payeee scaffolding installed successfully.');
    }
}
