<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Aminetiyal\LaravelCategories\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'slug' => $faker->unique()->slug,
    ];
});

$factory->state(Category::class, 'child', function (Faker $faker) {
    return [
        'category_id' => factory(Category::class)->create()->id
    ];
});