<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens , Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function settings()
    {
        return $this->hasOne(Setting::class);
    }
    public function grouo()
    {
        return $this->hasMany(Group::class);
    }
    public function block()
    {
        return $this->hasMany(Block::class);
    }




}
