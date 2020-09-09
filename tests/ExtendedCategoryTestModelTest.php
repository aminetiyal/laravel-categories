<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\Tests\ExtendedCategoryTestModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExtendedCategoryTestModelTest extends TestCase
{
    protected $testModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->testModel = ExtendedCategoryTestModel::create(['name' => 'test name']);
    }

    /** @test */
    public function it_provides_a_child_model_relation()
    {
        $this->assertInstanceOf(HasMany::class, $this->testModel->items());
    }
}
