<?php

use Faker\Generator as Faker;

$factory->define(App\SessionTime::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->numberBetween(1, App\Movie::count()),
        'cinema_id' => $faker->numberBetween(1, App\Cinema::count()),
        'datetime' => $faker->dateTimeBetween('+0 days', '+2 years')
    ];
});
