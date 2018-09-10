<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreated;

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

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
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

    function arsenal()
    {
        return $this->belongsToMany(Equipment::class, 'user_arsenals');
    }

    function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills');
    }

    function equipedArmor()
    {
        return $this->belongsTo(Equipment::class, 'armor');
    }

    function equipedWeapon()
    {
        return $this->belongsTo(Weapon::class);
    }

    function quests()
    {
        return $this->belongsToMany(Quest::class);
    }

    function questBooks()
    {
        return $this->belongsToMany(QuestBook::class, 'user_quest_books');
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
