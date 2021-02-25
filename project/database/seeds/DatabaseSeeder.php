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
            CartSeeder::class,
            DishSeeder::class,
            TypologySeeder::class,
            PaymentSeeder::class
            
        ]);
    }
}
