<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'gym_name', 'latitude', 'longitude',
    ];
}
