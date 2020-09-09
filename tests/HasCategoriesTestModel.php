<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\HasCategories;
use Illuminate\Database\Eloquent\Model;


class HasCategoriesTestModel extends Model
{
    use HasCategories;

    public $table = 'has_categories_test_models';

    protected $guarded = [];

    public $timestamps = false;
}
