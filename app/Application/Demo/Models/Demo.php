<?php

namespace App\Application\Demo\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $table = 'demo';

    protected $fillable = [
        'title',
        'img_1',
        'img_2',
        'file_1',
        'file_2',
    ];

    protected $casts = [
        'img_2' => 'array',
        'file_1' => 'json',
        'file_2' => 'array',
    ];
}
