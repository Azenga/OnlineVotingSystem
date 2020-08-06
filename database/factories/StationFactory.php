<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ward;
use App\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'ward_id' => factory(Ward::class),
    ];
});
