<?php

namespace App;

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
        'name' ,'type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function seeker() {
        return $this->hasOne('App\Seeker');
    }

    public function company() {
        return $this->hasOne('App\Company');
    }
    public function socialProvider()
    {
        return $this->hasMany('App\SocialProvider');
    }
}
