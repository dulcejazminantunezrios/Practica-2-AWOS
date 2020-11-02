<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\modelos\productos;
use Faker\Generator as Faker;

$factory->define(productos::class, function (Faker $faker) {
    return [
        'nombre_p'=>$faker->unique()->sentence(2), 
        'descripcion'=>$faker->text(100),
        'precio'=>$faker->randomFloat(2,0.01,999.99),
    ];
});
