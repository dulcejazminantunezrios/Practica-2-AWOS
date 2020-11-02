<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\modelos\productos;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(productos::class, 100)->create();
    }

}

