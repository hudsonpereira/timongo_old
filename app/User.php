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
        'name', 'email', 'password', 'nickname', 'vocation_id', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function map()
    {
        return $this->belongsTo(Map::class);
    }

    function vocation()
    {
        return $this->belongsTo(Vocation::class);
    }

    function getTitle()
    {
        if ($this->gender == 1) {
            return "o {$this->vocation->name}";
        }

        return "a {$this->vocation->female_name}";
    }

    function tnl()
    {
        return $this->level * 100;
    }
}
