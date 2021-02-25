<?php

use App\Dish;
use App\User;
use App\Category;
use App\Cart;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(Dish::class, 25) 
            -> make()
            -> each(function($dish){

                $user = User::inRandomOrder() -> first();
                $dish -> user() -> associate($user);
                
                $category = Category::inRandomOrder() -> first();
                $dish -> category() -> associate($category);
                
                $dish -> save();
            });
    }
}
