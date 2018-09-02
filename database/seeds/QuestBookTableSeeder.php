<?php

use Illuminate\Database\Seeder;

use App\QuestBook;

class QuestBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestBook::create([
            'name' => 'Conhecendo Dalaran'
        ]);
    }
}
