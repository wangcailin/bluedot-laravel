<?php

namespace App\Application\Demo\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'demo_form';

    protected $fillable = [
        'data',
    ];

    protected $casts = [
        'data' => 'json',
    ];
}
