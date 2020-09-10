<?php

namespace Aminetiyal\LaravelCategories;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/categories.php' => config_path('categories.php'),
            ], 'categories');

            if (!class_exists('CreateCategoriesTable')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__ . '/../database/migrations/2020_09_04_203529_create_categories_table.php' => database_path('migrations/' . $timestamp . '_create_categories_table.php'),
                ], 'migrations');
            }

            $this->publishes([
                __DIR__ . '/../stubs/Category.stub' => app_path('Models/Category.php'),
            ], 'categories');

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
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'categories');
    }
}
