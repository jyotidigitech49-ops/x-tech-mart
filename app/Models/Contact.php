<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $table = 'contact';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'msg',
        'ip_address',
        'inserted_at',
    ];
}
