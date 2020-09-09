<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Aminetiyal\LaravelCategories\Category;
use Aminetiyal\LaravelCategories\Tests\BelongsToCategoriesTestModel;
use Faker\Generator as Faker;

$factory->define(BelongsToCategoriesTestModel::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'category_id' => factory(Category::class)->create()->id
    ];
});