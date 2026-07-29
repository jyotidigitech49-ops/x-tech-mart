<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsDetailsPage extends Model
{
   protected $table = 'products_details_page';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'slug',
        'meta_title',
        'meta_description',
    ];
}
