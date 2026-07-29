<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = [
        'parent_id',
        'status',
        'name',
        'url',
        'image',
        'description',
        'sort',
    ];

    /**
     * Parent Category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Child Categories
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')
                    ->orderBy('sort');
    }
}
