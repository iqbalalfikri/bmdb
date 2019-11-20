<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
