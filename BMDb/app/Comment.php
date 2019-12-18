<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Menghubungkan tabel movies dan tabel comments dengan relasi 1..*
     */
    public function movies()
    {
        return $this->belongsTo('App\Movie', 'movie_id');
    }

    /**
     * Menghubungkan tabel users dan tabel comments dengan relasi 1..*
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function commentUser()
    {
        /**
         * Mengecek apakah comment yang ditampilkan adalah comment dari user yang log in
         */
        if (auth()->check())
            if ($this->user_id == auth()->user()->id) {
                return true;
            }

        return false;
    }
}
