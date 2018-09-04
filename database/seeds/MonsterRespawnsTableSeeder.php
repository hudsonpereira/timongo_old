<?php

use Illuminate\Database\Seeder;
use App\Monster;
use App\MonsterRespawn;
use App\Area;

class MonsterRespawnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRespawns('Gamba', 'Centro Comercial', 3, 5);
        $this->createRespawns('Sapo verde', 'Centro Comercial', 5, 5);
        $this->createRespawns('Sapo gigante', 'Entrada', 5, 10);
        $this->createRespawns('Troll', 'Entrada', 3, 10);
        $this->createRespawns('Dragão Infernal', 'Covil do Dragão Infernal', 1, 10);
    }

    function createRespawns($monsterName, $mapName, $howMany, $levelRange) {
        $monster = Monster::whereName($monsterName)->first();
        $map = Area::whereName($mapName)->first();

        for ($i=0; $i < $howMany; $i++) {
            $level = rand($map->level, $map->level + $levelRange);
            $hitpoints = $monster->hitpoints + round($monster->hitpoints_scale_ratio * $level);
            $attack = $monster->attack + round($monster->attack_scale_ratio * $level);
            $defence = $monster->defence + round($monster->defence_scale_ratio * $level);

            MonsterRespawn::create([
                'monster_id' => $monster->id,
                'area_id' => $map->id,
                'current_hitpoints' => $hitpoints,
                'max_hitpoints' => $hitpoints,
                'level' => $level,
                'attack' => $attack,
                'defence' => $defence,
                'experience' => 1,
                'token' => MonsterRespawn::generateToken(),
            ]);
        }
    }
}
