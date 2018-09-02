<?php

use Illuminate\Database\Seeder;
use App\Equipment;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipment = [
            $this->createEquipment('Roupa de Couro', 'leather-armor', 0, 1),
        ];

        foreach ($equipment as $equip) {
            Equipment::create($equip);
        }
    }

    function createEquipment($name, $image, $attack, $defence)
    {
        return compact('name', 'image', 'attack', 'defence');
    }
}
