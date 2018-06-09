<?php

use Faker\Generator as Faker;

$factory->define(App\Period::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'detail' => $faker->text(1000),
        'startDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'endDate' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
