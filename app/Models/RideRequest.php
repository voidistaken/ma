<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function rider () {
        return $this->belongsTo(Rider::class);
    }


    protected $casts = [
        'drivers' => 'array',
    ];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
}
