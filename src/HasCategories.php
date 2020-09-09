<?php

namespace Aminetiyal\LaravelCategories;

use Aminetiyal\LaravelCategories\Category;

trait HasCategories
{
    public static function getCategoryClassName(): string
    {
        return Category::class;
    }

    public function categories()
    {
        return $this->morphMany(self::getCategoryClassName(), 'categorizable');
    }
}
