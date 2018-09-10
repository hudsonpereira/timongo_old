<?php

namespace App;

use App\Traits\RendersAssetTrait;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use RendersAssetTrait;

    const JAB_SKILL_ID = 1;
}
