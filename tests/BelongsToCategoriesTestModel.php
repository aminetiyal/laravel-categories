<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\BelongsToCategories;
use Illuminate\Database\Eloquent\Model;


class BelongsToCategoriesTestModel extends Model
{
    use BelongsToCategories;

    public $table = 'belongst_to_categories_test_models';

    protected $guarded = [];

    public $timestamps = false;
}
