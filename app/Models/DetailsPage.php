<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsPage extends Model
{
     protected $table = 'details_page';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'url',
        'meta_title',
        'meta_description',
    ];
}
