<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\CategoriesServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;


class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [CategoriesServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing_database');
        $app['config']->set('database.connections.testing_database', [
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);


        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/2020_09_04_203529_create_categories_table.php';

        // run the up() method of that migration class
        (new \CreateCategoriesTable)->up();

        $app['db']->connection()->getSchemaBuilder()->create('belongst_to_categories_test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id');
        });

        $app['db']->connection()->getSchemaBuilder()->create('has_categories_test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
        });
    }
}
