<?php

use Illuminate\Database\Seeder;
use App\Map;
use App\Area;

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
                'name' => 'Dalaran',
                'description' => 'A cidade-metrópole Dalaran é conhecida por resistir inúmeras batalhas. Aqui os aventureiros poderão usufruir do livre comércio e ainda conseguir valiosas missões.',
                'level' => 1,
                'areas' => [
                        [
                            'name' => 'Centro comercial',
                            'level' => 1,
                        ],
                ]
            ],
            [
                'name' => 'Floresta Negra',
                'description' => 'Floresta proibída localizada ao sul de Dalaran. Dominada por seres de energia verde e elfos, é um lugar perigoso para quem não sabe aonde está indo.',
                'level' => 5,
                'areas' => [
                        [
                            'name' => 'Entrada',
                            'level' => 1,
                        ],
                ]
            ],
            [
                'name' => 'Torre do ancião',
                'description' => 'Poderosa construção bélica utilizada para neutralizar tropas utilizando magias de longo alcance e alta concentração de energia. Tudo aqui está abandonado, porém alguns comodos não são visitados há muito tempo.',
                'level' => 10,
                'areas' => [
                        [
                            'name' => 'Cerco',
                            'level' => 1,
                        ],
                ]
            ],
            [
                'name' => 'Caverna de Goblins',
                'level' => 15,
                'areas' => [
                        [
                            'name' => 'Pilares',
                            'level' => 1,
                        ],
                ]
            ],
            [
                'name' => 'Vulcão Atormentado',
                'level' => 20,
                'areas' => [
                        [
                            'name' => 'Entrada lateral',
                            'level' => 1,
                        ],
                ]
            ],
            [
                'name' => 'Vale Au\'lor',
                'level' => 25,
                'areas' => [
                        [
                            'name' => 'Covil do Dragão Infernal',
                            'level' => 1,
                        ],
                ]
            ],
        ];

        foreach ($maps as $map) {
            $mapModel = Map::create(array_only($map, ['name', 'description']));

            foreach($map['areas'] as $area) {
                $mapModel->areas()->create($area);
            }

        }
    }
}
