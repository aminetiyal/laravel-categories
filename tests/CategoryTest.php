<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\Category;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_can_create_a_category()
    {
        Category::create(['name' => 'test_name']);

        $this->assertCount(1, Category::all());
    }

    /** @test */
    public function it_can_update_a_category()
    {
        $category = factory(Category::class)->create();

        $category->update(['name' => 'changed name']);

        $this->assertEquals('changed name', $category->name);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = factory(Category::class)->create();

        $category->delete();

        $this->assertCount(0, Category::all());
    }

    /** @test */
    public function a_category_can_has_many_categories()
    {
        $category = factory(Category::class)->create();
        $subCategory = factory(Category::class)->create(['category_id' => $category->id]);

        $this->assertInstanceOf("Illuminate\Database\Eloquent\Collection", $category->categories);

        $this->assertTrue($category->categories->contains($subCategory));

        $this->assertEquals(1, $category->categories->count());
    }

    /** @test */
    public function a_category_belongs_to_a_category()
    {
        $category = factory(Category::class)->create();
        $subCategory = factory(Category::class)->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $subCategory->parent);
    }

    /** @test */
    public function a_category_belongs_to_parent_model()
    {
        $parent = HasCategoriesTestModel::create(['name' => 'default']);

        $category = factory(Category::class)->create();

        $category->categorizable()->associate($parent);

        $category->save();

        $this->assertInstanceOf(HasCategoriesTestModel::class, $category->categorizable);
    }


    /** @test */
    public function a_category_who_doesnt_belongs_to_parent_model_return_default_value()
    {
        $category = factory(Category::class)->create();

        $this->assertEquals(["categorizable_id" => 0,"categorizable_type" => 0], $category->categorizable->toArray());
    }
}
