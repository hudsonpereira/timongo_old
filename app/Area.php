<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    function map()
    {
        return $this->belongsTo(Map::class);
    }

    function respawns()
    {
        return $this->hasMany(MonsterRespawn::class);
    }
}
