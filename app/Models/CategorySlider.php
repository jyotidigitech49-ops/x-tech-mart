<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySlider extends Model
{
  protected $fillable = [
        'status',
        'cat_id',
        'slider',
        'link',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
