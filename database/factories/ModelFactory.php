<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'tipo'=>2,
        'estado'=>1
    ];
});

$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'asignado'=>0
    ];
});
