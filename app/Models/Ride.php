<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rider() {
        return $this->belongsTo(Rider::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}
