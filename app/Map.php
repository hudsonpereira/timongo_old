<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    const DALARAN_MAP_ID = 1;

    public $fillable = [
        'name', 'description', 'level'
    ];

    function areas()
    {
        return  $this->hasMany(Area::class);
    }

    function questGivers()
    {
        return $this->hasMany(QuestGiver::class);
    }
}
