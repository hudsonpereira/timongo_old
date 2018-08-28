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
                'name' => 'Cavaleiro'
            ],
            [
                'name' => 'Druida'
            ],
            [
                'name' => 'Paladino'
            ],
            [
                'name' => 'Feiticeiro'
            ],
        ];

        foreach ($vocations as $vocation) {
            Vocation::create($vocation);
        }
    }
}
