<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    $options = ['super-admin', 'admin', 'officer', 'candidate', 'voter'];
    
    return [
        'title' => $faker->randomElement($options),
        'description' => $faker->paragraph,
    ];
});
