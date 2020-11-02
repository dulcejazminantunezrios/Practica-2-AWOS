<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\modelos\personas;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(personas::class, 100)->create();
    }
}
