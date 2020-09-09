<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Orchestra\Testbench\TestCase;
use Aminetiyal\LaravelCategories\LaravelCategoriesServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelCategoriesServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
