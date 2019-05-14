<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function hasPermission($module, $nivel = 1)
    {
        switch ($module) {
            case 'master':
                return $this->permissionMaster;
            case 'event':
                return $this->permissionEvent >= $nivel || $this->permissionMaster;
            case 'meal':
                return $this->permissionMeal >= $nivel || $this->permissionMaster;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissionMeal',
        'permissionEvent',
        'permissionMaster'
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
}
