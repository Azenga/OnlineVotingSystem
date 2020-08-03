<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use App\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {

    $options = [
        'President', 
        'Governor', 'Senetor', 
        'Women Representative', 
        'Member Of Parliament', 
        'Member of County Assembly'
    ];

    return [
        'title' => $faker->randomElement($options),
        'level_id' => factory(Level::class),
        'description' => $faker->paragraph,
    ];
});
