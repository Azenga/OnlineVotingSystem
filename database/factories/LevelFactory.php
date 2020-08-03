<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {

    $options = ['Country', 'County', 'Constituency', 'Ward'];

    return [
        'title' => $faker->randomElement($options),
    ];
});
