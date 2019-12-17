<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieUser extends Model
{
    /**
     * Attributes yang dapat diisi
     */
    protected $fillable = ['movie_id', 'user_id'];

    /**
     * Menghubungkan tabel movie_users dengan movies dengan relasi 1..*
     */
    public function movies()
    {
        return $this->belongsTo('App\Movie', 'movie_id');
    }

    /**
     * Menghubungkan tabel movie_users dengan users dengan relasi 1..*
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
