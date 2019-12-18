<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Menghubungkan tabel genres dengan tabel movies dengan relasi 1..*
     */
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
