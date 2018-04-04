<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'commenter_name' => $faker->name,
        'comment' => $faker->sentences(rand(1, 5), true),
        'deleted_at' => $faker->boolean(20) ? $faker->dateTimeBetween('-2 months') : null,
    ];
});
