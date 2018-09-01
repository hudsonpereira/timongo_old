<?php

use Illuminate\Database\Seeder;
use App\QuestGiver;
use App\Area;

class QuestGiversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $npcs = [
            [
                'name' => 'Estátua do Juramento',
                'image' => 'npc-guard',
                'area_id' => Area::DALARAN_DOWNTOWN,
            ]
        ];

        foreach ($npcs as $npc) {
            QuestGiver::create($npc);
        }
    }
}
