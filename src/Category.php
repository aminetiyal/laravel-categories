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
        return $this->morphTo()
            ->withDefault(['categorizable_id' => 0, 'categorizable_type' => 0]);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    /**
     * Set 0 instead of null value in categorizable_id to prevent unique with null issue
     *
     * @param integer $value
     * @return void
     */
    public function setCategorizableIdAttribute($value)
    {
        $this->attributes['categorizable_id'] = empty($value) ? 0 : $value;
    }

    /**
     * Set 0 instead of null value in categorizable_type to prevent unique with null issue
     *
     * @param string $value
     * @return void
     */
    public function setCategorizableTypeAttribute($value)
    {
        $this->attributes['categorizable_type'] = empty($value) ? 0 : $value;
    }
}
