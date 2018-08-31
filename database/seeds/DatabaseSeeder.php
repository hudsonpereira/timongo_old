<?php

use Illuminate\Database\Seeder;
use App\User;

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

        if (App::environment('local')) {
            User::create([
                'email' => 'hudson.byte@gmail.com',
                'nickname' => 'Dishark',
                'password' => bcrypt('abcd12'),
                'name' => 'Hudson',
                'gender' => 1,
                'vocation_id' => 1,
            ]);
        }
    }
}
