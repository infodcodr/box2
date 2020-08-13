<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
     {
         return $this->belongsTo(User::class,'from', 'id');
     }

     public function touser()
     {
         return $this->belongsTo(User::class, 'to','id');
     }
}
