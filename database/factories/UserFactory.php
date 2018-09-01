<?php

use Faker\Generator as Faker;
use App\Vocation;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $vocation = Vocation::all()->random();
    $gender = rand(1, 2);

    return [
        'name' => $gender == 1 ? $faker->firstNameMale : $faker->firstNameFemale,
        'nickname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'vocation_id' => $vocation->id,
        'gender' => $gender,
        'map_id' => 1,
        'area_id' => 1,
    ];
});
