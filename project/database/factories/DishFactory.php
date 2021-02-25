<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [

        'name'   => $faker -> word(),
        'status' => rand(0, 1),
        'price'  => rand(5, 40) ,
        'description' => $faker -> paragraph(),
        'img_dish' => $faker -> imageUrl()
    ];
});
