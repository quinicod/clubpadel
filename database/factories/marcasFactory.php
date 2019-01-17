<?php

use Faker\Generator as Faker;

$factory->define(App\marcas::class, function (Faker $faker) {
    return [
       'nombre' => $faker->name
    ];
});
