<?php

use App\Dish;
use App\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {

        factory(Cart::class, 20) //creo i miei 20 dishes
                -> create()                   //li salvo direttamente in database
                -> each(function($cart) {      //per ogni dish
                //prendi cart casualmente, recupero da 1 a 50 dishesz
                $dishes = Dish::inRandomOrder() -> limit(50) -> get();   
                $cart -> dishes() -> attach($dishes);

            });
    }
}
