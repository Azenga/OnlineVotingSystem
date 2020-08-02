<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use App\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'level_id' => factory(Level::class),
        'description' => $faker->paragraph,
    ];
});
