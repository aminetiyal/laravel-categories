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

        $this->testModel = factory(HasCategoriesTestModel::class)->create();
    }

    /** @test */
    public function it_provides_a_categories_relation()
    {
        $this->assertInstanceOf(MorphMany::class, $this->testModel->categories());
    }

    /** @test */
    public function a_parent_model_can_has_many_categories()
    {
        $category = factory(Category::class)->create();

        $category->categorizable()->associate($this->testModel);

        $category->save();

        $this->assertTrue($this->testModel->categories->contains($category));

        $this->assertEquals(1, $this->testModel->categories->count());
    }
}
