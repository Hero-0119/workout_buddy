<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'gym_id', 'title', 'about_group', 'fee', 'sex_limit', 'number_limit', 'gym_img', 'published_at', 'event_date', 'start_time', 'end_time', 
    ];

    public function gym(){
        return $this->belongsTo(\App\Gym::class,'gym_id');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

}
