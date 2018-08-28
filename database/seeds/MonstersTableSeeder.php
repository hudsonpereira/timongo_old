<?php

use Illuminate\Database\Seeder;
use App\Monster;

class MonstersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monsters = [
            $this->monster('Gamba', 'badger', 1, 2, 10),
            $this->monster('Sapo verde', 'green-frog', 1, 2, 10),
        ];

        foreach ($monsters as $monster) {
            Monster::create($monster);
        }
    }

    private function monster($name, $image, $attack, $defence, $hitpoints) {
        return [
            'name' => $name,
            'image' => $image,
            'attack' => $attack,
            'defence' => $defence,
            'hitpoints' => $hitpoints
        ];
    }
}
