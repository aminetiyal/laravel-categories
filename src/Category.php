<?php

namespace Aminetiyal\LaravelCategories;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Category extends Model implements Sortable
{
    use SortableTrait;

    protected $fillable = ['name', 'slug'];

    public function getTable()
    {
        return config('categories.table', parent::getTable());
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get the owning categorizable model.
     */
    public function categorizable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
