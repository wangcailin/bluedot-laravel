<?php

namespace App\Application\DemoDragger\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DemoDragger extends Model
{
    public $timestamps = true;
    
    protected $table = 'demo_dragger';

    protected $fillable = [
        'title',
        'sort',
        'detail',
    ];

    protected $casts = [

    ];

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::parse($value);
    }
}
