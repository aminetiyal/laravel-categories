<?php

namespace Aminetiyal\LaravelCategories;

use Aminetiyal\LaravelCategories\Category;

trait BelongsToCategories
{
    protected $categoryForeignKey = "category_id";

    public static function getCategoryClassName(): string
    {
        return Category::class;
    }

    public function category()
    {
        return $this->belongsTo(self::getCategoryClassName(), $this->categoryForeignKey);
    }

    /**
     * Associate to a specific category
     *
     * @param object|integer $category
     * @return self
     */
    public function associateToCategory($category): self
    {
        $this->category()->associate($category);

        $this->update();

        return $this;
    }


    /**
     * Dissociate current mode from any category
     *
     * @return self
     */
    public function dissociateFromCategory(): self
    {
        $this->category()->dissociate();

        $this->update();

        return $this;
    }
}
