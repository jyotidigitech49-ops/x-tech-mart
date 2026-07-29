<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogMeta extends Model
{
    protected $table = 'blogs_meta';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'url',
        'meta_title',
        'meta_description',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'A');
    }
}
