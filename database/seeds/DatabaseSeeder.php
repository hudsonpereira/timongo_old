<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MapsTableSeeder::class);
        $this->call(VocationsTableSeeder::class);
        $this->call(MonstersTableSeeder::class);
        $this->call(MonsterRespawnsTableSeeder::class);
    }
}
