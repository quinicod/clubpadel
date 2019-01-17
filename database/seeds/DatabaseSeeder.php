<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class)->create([
        //     'email' => 'joaquinitosanlucar@gmail.com',
        //     'name' => 'Quino',
        // 'remember_token' => str_random(10),
        //     ]
        // );
        factory(\App\Tipoproducto::class, 25)->create();
        factory(\App\marcas::class, 25)->create();
    	factory(\App\Productos::class, 25)->create();
        factory(\App\Productos::class, 25)->create();
    }
}
