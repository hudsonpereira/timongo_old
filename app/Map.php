<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    function respawns() {
        return $this->hasMany(MonsterRespawn::class);
    }
}
