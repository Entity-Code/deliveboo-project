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

            TypologySeeder::class,
            RestaurantSeeder::class,
            DishSeeder::class,
            CategorySeeder::class,
            CartSeeder::class,
            PaymentSeeder::class
        ]);
    }
}
