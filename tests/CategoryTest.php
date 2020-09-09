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
}
