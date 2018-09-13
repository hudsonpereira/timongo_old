<?php

namespace App\Observers;

use App\User;
use App\Equipment;
use App\QuestBook;
use App\Skill;
use App\Map;
use App\Area;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //add first armor to the arsenal
        // $user->arsenal()->attach(Equipment::LEATHER_ARMOR_ID);

        $user->skills()->attach(Skill::JAB_SKILL_ID);
        $user->knownMaps()->attach(Map::DALARAN_MAP_ID);
        $user->knownAreas()->attach(Area::DALARAN_DOWNTOWN);
        $user->questBooks()->attach(QuestBook::EXPLORING_DALARAN);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
