<?php

use App\Dish;
use App\Payment;

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, 20)      //creo le mie 20 typologies
            -> create()                   //le salvo direttamente in database
            -> each(function($payment) {      //per ogni typologies:
            //prendi user casualmente, recupero da 1 a 5 employee
            $dishes = Dish::inRandomOrder() -> get();   
            $payment -> dishes() -> attach($dishes);

        });
    }
}
