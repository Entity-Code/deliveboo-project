<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([

            UserSeeder::class,
            CategorySeeder::class,
            DishSeeder::class,
            CartSeeder::class,
            TypologySeeder::class,
            PaymentSeeder::class
            
        ]);
    }
}
