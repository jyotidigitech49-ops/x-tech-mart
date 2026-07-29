<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    protected $table = 'product_enquiries';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'quantity',
        'company',
        'message',
        'ip_address',
        'inserted_at',
    ];
}
