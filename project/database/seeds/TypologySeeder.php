<?php

use App\User;
use App\Typology;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Typology::class, 5)      //creo le mie 20 typologies
            -> create()                   //le salvo direttamente in database
            -> each(function($typ) {      //per ogni typologies:
            //prendi user casualmente, recupero da 1 a 5 employee
            $users = User::inRandomOrder() -> limit(5) -> get();   
            $typ -> users() -> attach($users);

            });
    }
}


