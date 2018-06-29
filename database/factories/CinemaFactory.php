<?php

use Faker\Generator as Faker;

$factory->define(App\Cinema::class, function (Faker $faker) {
    return [
        'name' => $faker->city . ' Cinema',
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
