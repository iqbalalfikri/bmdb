<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

    /**
     * Menghubungkan tabel users dan tabel roles dengan relasi 1..*
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
