<?php

use Illuminate\Database\Seeder;
use App\Map;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = [
            [
                'name' => 'Dalaran (centro)',
                'description' => 'A cidade-metrópole Dalaran é conhecida por resistir inúmeras batalhas. Aqui os aventureiros poderão usufruir do livre comércio e ainda conseguir valiosas missões.',
                'level' => 1,
            ],
            [
                'name' => 'Floresta Negra',
                'description' => 'Floresta proibída localizada ao sul de Dalaran. Dominada por seres de energia verde e elfos, é um lugar perigoso para quem não sabe aonde está indo.',
                'level' => 5,
            ],
            [
                'name' => 'Torre do ancião',
                'description' => 'Poderosa construção bélica utilizada para neutralizar tropas utilizando magias de longo alcance e alta concentração de energia. Tudo aqui está abandonado, porém alguns comodos não são visitados há muito tempo.',
                'level' => 10,
            ],
            [
                'name' => 'Caverna de Goblins',
                'level' => 15,
            ],
            [
                'name' => 'Vulcão Atormentado',
                'level' => 20,
            ],
        ];

        foreach ($maps as $map) {
            Map::create($map);
        }
    }
}
