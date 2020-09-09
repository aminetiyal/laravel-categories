<?php

namespace Aminetiyal\LaravelCategories;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aminetiyal\LaravelCategories\Skeleton\SkeletonClass
 */
class LaravelCategoriesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-categories';
    }
}
