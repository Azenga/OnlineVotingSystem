<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\County;
use App\Constituency;
use Faker\Generator as Faker;

$factory->define(Constituency::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'county_id' => factory(County::class),
        'description' => $faker->sentence,
    ];
});
