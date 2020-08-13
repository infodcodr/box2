<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->hasManyThrough(User::class, GroupAdmin::class);
    }

    public function member()
    {
        return $this->hasManyThrough(User::class, GroupUser::class);
    }
}
