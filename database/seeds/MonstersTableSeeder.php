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
            $this->monster('Gambá', 'badger', 1, 2, 10, 1.2, 1.3, 5.5),
            $this->monster('Sapo verde', 'green-frog', 1, 2, 10, 1.2, 1.3, 6.5),
            $this->monster('Sapo gigante', 'toast', 5, 5, 35, 3, 2, 10),
            $this->monster('Troll', 'troll', 12, 8, 105, 6, 5, 30),
            $this->monster('Dragão Infernal', 'dragon-lord', 100, 85, 10000, 23.5, 23.3, 100),
        ];

        foreach ($monsters as $monster) {
            Monster::create($monster);
        }
    }

    private function monster($name, $image, $attack, $defence, $hitpoints, $attackRatio, $defenceRatio, $hitpointsRatio) {
        return [
            'name' => $name,
            'image' => $image,
            'attack' => $attack,
            'defence' => $defence,
            'hitpoints' => $hitpoints,
            'attack_scale_ratio' => $attackRatio,
            'defence_scale_ratio' => $defenceRatio,
            'hitpoints_scale_ratio' => $hitpointsRatio,
        ];
    }
}
