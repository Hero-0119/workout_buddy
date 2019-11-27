<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_evaluation', 'feedback_comment', 'post_id', 'totalization_id', 'user_id'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function participant(){
        return $this->belongsTo('App\PostUser');
    }

    public function totalization(){
        return $this->belongsTo('App\Totalization');
    }
}
