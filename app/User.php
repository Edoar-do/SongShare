<?php

namespace SongShare;

use Illuminate\Notifications\Notifiable;
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
    
    public function songs() {
        // use the 'authors' property: $user->authors (returns an array)
        return $this->hasMany('SongShare\Song');
    }   
    
    public function mipiaces() {
        // use the 'authors' property: $user->authors (returns an array)
        return $this->hasMany('SongShare\MiPiace');
    }   
    
    
}
