<?php

use Illuminate\Database\Seeder;
use App\Vocation;

class VocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vocations = [
            [
                'name' => 'Cavaleiro',
                'female_name' => 'Amazona',
            ],
            [
                'name' => 'Druida',
                'female_name' => 'Druidesa',
            ],
            [
                'name' => 'Paladino',
                'female_name' => 'Paladina',
            ],
            [
                'name' => 'Feiticeiro',
                'female_name' => 'Feiticeira',
            ],
        ];

        foreach ($vocations as $vocation) {
            Vocation::create($vocation);
        }
    }
}
