<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalization extends Model
{
    protected $fillable = [
        'evaluation', 'user_id', 'post_id',
    ];

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function host(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }

}
