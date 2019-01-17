<?php

use Faker\Generator as Faker;

$factory->define(App\Productos::class, function (Faker $faker) {
    return [
    	'nombre' => 'Pala Dumlop',
    	'descripcion' => 'Descripcion del articulo',
    	'stock' => '50',
    	'precio' => 150,
    	'talla' => 'M',
    	'imagen' => 'images/pala3.jpg',
    	'marca' => App\marcas::all()->random()->nombre,
    	'tipo' => App\tipoproducto::all()->random()->nombre,
    ];
});
