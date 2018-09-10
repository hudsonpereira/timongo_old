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
    }

    function newSkill($name, $description, $image, $vocationId = null)
    {
        $skill = array_merge(compact('name', 'description', 'image'), [
            'vocation_id' => $vocationId,
            'token' => str_slug($name),
        ]);

        Skill::create($skill);
    }
}
