<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->newSkill('Jab', 'Um golpe rápido com poucos riscos, mas também não tão forte.', 'jab');

        // Knight

        $this->newSkill('Swing', 'Golpe de meia distância com espada.', 'front-sweep', 2);


        // Archer

        $this->newSkill('Tiro de precisão', 'Tiro de precisão máxima, têm 20% de chance de crítico.', 'focus-shot');
    }

    function newSkill($name, $description, $image, $level  = 1, $vocationId = null)
    {
        $skill = array_merge(compact('name', 'description', 'image'), [
            'vocation_id' => $vocationId,
            'level_required' => $level,
            'token' => str_slug($name),
        ]);

        Skill::create($skill);
    }
}
