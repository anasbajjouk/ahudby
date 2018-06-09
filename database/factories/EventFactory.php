<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'detail' => $faker->text(1000),
        'date' => $faker->randomDigitNotNull,
        'period_id' => 1

    ];
});
