<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'name' => $faker->word($nb = 3, $asText = false),
        'description' => $faker->text(1000),
        'path' => $faker->imageUrl($width = 640, $height = 480),
        'startDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'endDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'author_id' => 1,
        'period_id' => 2
    ];
});
