<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieUser extends Model
{
    protected $fillable = ['movie_id', 'user_id'];
    public function movies()
    {
        return $this->belongsTo('App\Movie', 'movie_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
