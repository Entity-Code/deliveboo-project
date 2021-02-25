<?php

use App\Payment;
use App\User;

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
        factory(Payment::class, 50) 
		    -> make() 
		    -> each(function($payment){ 
            //dd($payment);
            $user = User::inRandomOrder() -> first(); 
            $payment -> user() -> associate($user); 
            $payment -> save();
        });
    }
}
