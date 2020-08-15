<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Position;
use App\Candidature;
use Faker\Generator as Faker;

$factory->define(Candidature::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'position_id' => factory(Position::class),
        'location_id' => 1,
        'running_mate_id' => $faker->randomDigit,
    ];
});
