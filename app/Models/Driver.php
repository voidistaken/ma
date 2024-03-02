<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['role'];

    public function getRoleAttribute() {
        return 'driver';
    }

    public function rideRequest() {
        return $this->hasOne(RideRequest::class);
    }

}
