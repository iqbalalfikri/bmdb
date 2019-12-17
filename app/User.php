<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'address', 'dob', 'picture', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Menghubungkan tabel users dan tabel comments dengan relasi 1..*
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Menghubungkan tabel users dan tabel inboxes dengan relasi 1..*
     */
    public function inboxes()
    {
        return $this->hasMany('App\Inbox');
    }

    /**
     * Menghubungkan tabel roles dan tabel users dengan relasi 1..*
     */
    public function roles()
    {
        return $this->belongsTo('App\roles', 'role_id');
    }

    /**
     * Menghubungkan tabel users dan tabel movies dengan relasi *..*
     */
    public function movies()
    {
        return $this->belongsToMany('App\Movies');
    }

    /**
     * Mengecek apakah user ini adalah user yang sedang log in
     */
    public function loggedInUser()
    {
        if ($this->id == auth()->user()->id)
            return true;

        return false;
    }

    /**
     * Mengecek apakah user yang sedang log in adalah admin
     */
    public function isAdmin()
    {
        if ($this->role_id == 1)
            return true;

        return false;
    }
}
