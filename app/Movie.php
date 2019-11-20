<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
