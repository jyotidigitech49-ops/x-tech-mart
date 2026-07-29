<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyPage extends Model {
    protected $table = 'policy_pages';

    public $timestamps = false;

    protected $fillable = [
        'status',
        'inserted_at',
        'heading',
        'slug',
        'content',
    ];
}
