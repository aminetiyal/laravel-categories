<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Aminetiyal\LaravelCategories\Category;
use Aminetiyal\LaravelCategories\Tests\HasCategoriesTestModel;
use Faker\Generator as Faker;

$factory->define(HasCategoriesTestModel::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});