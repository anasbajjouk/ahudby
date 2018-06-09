<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'bd' => $faker->date(),
        'name'=> $faker->name,
        'deathdate' => $faker->date(),
        'bio' => $faker->text(1000),
		'externalLink' => $faker->url()
    ];
});
