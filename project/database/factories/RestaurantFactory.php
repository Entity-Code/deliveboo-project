<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker -> unique() -> company(),
        'city' => $faker -> city(),
        'logo' => $faker -> imageUrl(),
        'day_off' => $faker -> dayOfWeek(),
        'rating' => rand(1, 5),
    ];
});
