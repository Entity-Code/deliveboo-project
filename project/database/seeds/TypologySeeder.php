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
        //  factory(Typology::class, 20)  
        //     -> create()                    
        //     -> each(function($typ) {      
        //         //prendi user casualmente, recupero da 1 a 5 users
        //         $users = User::inRandomOrder() -> get();   
        //         $typ -> users() -> attach($users);

        // }); 
        factory(Typology::class, 5) -> create()
            -> each(function ($typo) {
                $user = User::inRandomOrder() -> limit(rand(1,8)) -> get();
                $typo -> users() -> attach($user);
        });
    }
}


