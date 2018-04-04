<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'content' => $faker->paragraphs(rand(3, 9), true),
        'category' => array_random(['project', 'story', 'achievement', 'reaction']),
        'nb_views' => rand(100, 2500),
        'published_at' => $faker->boolean(85) ? $faker->dateTimeBetween('-2 years') : null,
        'deleted_at' => $faker->boolean(10) ? $faker->dateTimeBetween('-1 years') : null,
    ];
});
