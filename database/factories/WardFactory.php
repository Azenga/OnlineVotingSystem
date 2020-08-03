<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ward;
use App\Constituency;
use Faker\Generator as Faker;

$factory->define(Ward::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'constituency_id' => factory(Constituency::class),
        'description' => $faker->paragraph,
    ];
});
