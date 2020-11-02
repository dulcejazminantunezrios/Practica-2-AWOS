<?php

use App\modelos\comentarios;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(comentarios::class, 125)->create();
    }
}
