<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'bio' => $faker->sentence(12, true),
        'is_guest' => $faker->boolean(65),
    ];
});
