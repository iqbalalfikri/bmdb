<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    /**
     * Menghubungkan tabel users dan tabel inboxes dengan relasi 1..*
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
