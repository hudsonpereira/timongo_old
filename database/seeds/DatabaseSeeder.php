<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

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
        $this->call(QuestGiversTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(QuestBookTableSeeder::class);
        $this->call(QuestsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);

        if (App::environment('local')) {
            User::create([
                'email' => 'hudson.byte@gmail.com',
                'nickname' => 'Dishark',
                'password' => bcrypt('abcd12'),
                'name' => 'Hudson',
                'gender' => 1,
                'vocation_id' => 1,
            ]);

            // $factory = new Factory();

            factory(App\User::class, 10)->create();
        }
    }
}
