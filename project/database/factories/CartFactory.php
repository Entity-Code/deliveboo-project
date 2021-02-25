<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'subtotal' => rand(10, 100),
        'quantity' => rand(1, 10)
    ];
});
