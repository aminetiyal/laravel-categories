<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BelongsToCategoriesTraitTest extends TestCase
{
    protected $testModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->testModel = factory(BelongsToCategoriesTestModel::class)->create();
    }


    /** @test */
    public function it_provides_a_category_relation()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->testModel->category());
    }

    /** @test */
    public function a_child_model_belongs_to_catgeory()
    {
        $this->assertInstanceOf(Category::class, $this->testModel->category);
    }
}
