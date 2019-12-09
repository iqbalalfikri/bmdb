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

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function isSaved()
    {

        $movies = MovieUser::where('movie_id', $this->id)->get();

        foreach ($movies as $movie) {
            if (auth()->user()->id == $movie->user_id) {
                return true;
            }
        }

        return false;
    }
}
