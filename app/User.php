<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements JWTSubject
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }



    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTCustomClaims()
    {
        return [];
    }


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
