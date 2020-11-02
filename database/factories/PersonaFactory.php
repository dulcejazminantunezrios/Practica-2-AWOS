<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\modelos\personas;
use Faker\Generator as Faker;

$factory->define(personas::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->unique()->name,
        'apellido'=> $faker->lastName(),
        'correo'=> $faker-> unique()->safeEmail,
        'edad'=> $faker -> numberBetween(1, 99),
    ];
});
