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
        'name', 'email', 'password', 'nickname', 'vocation_id', 'gender', 'current_hitpoints'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'dead_until'
    ];

    function map()
    {
        return $this->belongsTo(Map::class);
    }

    function area()
    {
        return $this->belongsTo(Area::class);
    }

    function vocation()
    {
        return $this->belongsTo(Vocation::class);
    }

    // ACESSORS AND MUTATORS

    function setCurrentHitpointsAttribute($value)
    {
        $this->attributes['current_hitpoints'] = ($value > 0) ? $value : 0;
    }

    function setCurrentEnergyAttribute($value)
    {
        $this->attributes['current_energy'] = ($value > 0) ? $value : 0;
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

    function isDead()
    {
        return $this->current_hitpoints == 0;
    }

    function revive()
    {
        $this->current_hitpoints = $this->max_hitpoints;
        $this->dead_until = null;

        return $this;
    }

    function procHealthRegen()
    {
        $this->current_hitpoints += 10;

        if ($this->current_hitpoints > $this->max_hitpoints) {
            $this->current_hitpoints = $this->max_hitpoints;
        }

        return $this;
    }
}
