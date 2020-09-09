<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\Category;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class HasCategoriesTraitTest extends TestCase
{
    protected $testModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->testModel = HasCategoriesTestModel::create(['name' => 'default']);
    }

    /** @test */
    public function it_provides_a_categories_relation()
    {
        $this->assertInstanceOf(MorphMany::class, $this->testModel->categories());
    }
}
