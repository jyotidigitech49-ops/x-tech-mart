<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOverview extends Model {
    protected $table = 'product_overview';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'product_id',
        'headkey',
        'value',
        'overview',
    ];
}
