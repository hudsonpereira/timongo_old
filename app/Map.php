<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $fillable = [
        'name', 'description', 'level'
    ];

    function respawns()
    {
        return $this->hasMany(MonsterRespawn::class);
    }

    function areas()
    {
        return  $this->hasMany(Area::class);
    }
}
