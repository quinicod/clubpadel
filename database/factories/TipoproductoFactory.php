<?php

use Faker\Generator as Faker;

$factory->define(App\Tipoproducto::class, function (Faker $faker) {
    return [
    	'nombre' => $faker->name
    ];
});