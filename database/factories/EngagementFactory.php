<?php

$factory->define(App\Engagement::class, function (Faker\Generator $faker) {
    return [
        "stats_date" => $faker->date("Y-m-d", $max = 'now'),
        "fans" => $faker->randomNumber(2),
        "engagements" => $faker->randomNumber(2),
        "reactions" => $faker->randomNumber(2),
        "comments" => $faker->randomNumber(2),
        "shares" => $faker->randomNumber(2),
    ];
});
