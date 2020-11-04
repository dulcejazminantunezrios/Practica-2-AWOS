<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\modelos\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'dulce',
            'email'=>'dulcejazmin@gmail.com',
            'password' => Hash::make('0705161909'),
            'permiso'=>'admin',
            'persona'=>'1'
        ]);    
        factory(User::class, 100)->create();
    }
}
