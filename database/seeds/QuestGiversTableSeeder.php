<?php

use Illuminate\Database\Seeder;
use App\QuestGiver;
use App\QuestBook;
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
                'quest_book_id' => QuestBook::EXPLORING_DALARAN,
                'step' => 1,
                'words' => 'Boas vindas :user:, muitos ouvimos falar de teus feitos. Ao se aliar a Dalaran você precisa se apresentar para o General Elliot, mas vejo que você não possui nenhum equipamento ou armamento. Vamos fazer assim: você me ajuda com um problema e eu te ajudo a montar o teu primeiro arsenal. Preciso muito que alguêm dê um jeito nesta super população de sapos e gambás no centro de Dalaran. Isto tem incomodado o comandante. Quero que você mate pelo menos 10 de cada tipo. O que você acha?',
                'action' => 'Vou ajudar!',
                'area_id' => Area::DALARAN_DOWNTOWN,
            ]
        ];

        foreach ($npcs as $npc) {
            QuestGiver::create($npc);
        }
    }
}
