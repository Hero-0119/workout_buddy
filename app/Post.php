<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'gym_id', 'title', 'about_group', 'fee', 'sex_limit', 'number_limit', 'gym_img', 'published_at', 'event_date', 'start_time', 'end_time', 'host_id',
    ];

    public function gym(){
        return $this->belongsTo('App\Gym');
    }

    public function host(){
        return $this->belongsTo('App\User');
    }

    public function participants(){
        return $this->belongsToMany('App\User','post_users');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function totalizations(){
        return $this->hasMany('App\Totalization');
    }
}
