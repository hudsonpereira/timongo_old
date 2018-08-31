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

    function doRespawn()
    {
        $this->cleared_at = null;
        $this->current_hitpoints = $this->max_hitpoints;

        return $this->changeToken();
    }

    function changeToken()
    {
        $this->token = self::generateToken();

        return $this;
    }

    static function generateToken()
    {
        return str_random(10);
    }
}
