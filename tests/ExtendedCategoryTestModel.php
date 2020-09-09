<?php

namespace Aminetiyal\LaravelCategories\Tests;

use Aminetiyal\LaravelCategories\Category;
use Aminetiyal\LaravelCategories\Tests\BelongsToCategoriesTestModel;

class ExtendedCategoryTestModel extends Category
{
    public function items()
    {
        return $this->hasMany(BelongsToCategoriesTestModel::class);
    }
}
