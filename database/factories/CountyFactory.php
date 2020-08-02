<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\County;
use Faker\Generator as Faker;

$factory->define(County::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'region' => $faker->word,
    ];
});
