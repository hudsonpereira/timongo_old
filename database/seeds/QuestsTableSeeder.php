<?php

use Illuminate\Database\Seeder;
use App\Quest;

class QuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quest::create([
            'name' => 'Controle de super população',
            'description' => 'Para concluir esta missão você deverá derrotar 10 sapos e 10 gambás. Eles provavelmente querem testar o seu nível de combate. Boa sorte!',
        ]);
    }
}
