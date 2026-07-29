<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
   protected $table = 'product_specification';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'product_id',
        'tab',
        'headkey',
        'value',
    ];
}
