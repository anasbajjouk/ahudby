<?php

use Faker\Generator as Faker;

$factory->define(App\Composition::class, function (Faker $faker) {
    return [
        'description' => $faker->text(1500),
        'name' => $faker->lastName,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'soundTrack' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
