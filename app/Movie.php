<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * Menghubungkan tabel genres dan tabel movies dengan relasi 1..*
     */
    public function genres()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }

    /**
     * Menghubungkan tabel movies dan tabel comments dengan relasi 1..*
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Menghubungkan tabel movies dan tabel users dengan relasi *..*
     * yang dihubungkan dengan tabel movie_users
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function isSaved()
    {

        /**
         * Mengecek apakah user yang sedang login menyimpan suatu movie berdasarkan movie_id
         */
        $movies = MovieUser::where('movie_id', $this->id)->get();

        foreach ($movies as $movie) {
            if (auth()->user()->id == $movie->user_id) {
                return true;
            }
        }

        return false;
    }
}
