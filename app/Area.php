<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    const DALARAN_DOWNTOWN = 1;

    function map()
    {
        return $this->belongsTo(Map::class);
    }

    function respawns()
    {
        return $this->hasMany(MonsterRespawn::class);
    }
}
