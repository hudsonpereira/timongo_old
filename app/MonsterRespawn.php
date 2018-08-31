<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonsterRespawn extends Model
{
    public function monster()
    {
        return $this->belongsTo(Monster::class);
    }

    function setCurrentHitpointsAttribute($value)
    {
        $this->attributes['current_hitpoints'] = ($value > 0) ? $value : 0;
    }
}
