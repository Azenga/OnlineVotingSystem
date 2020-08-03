<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\County;
use Faker\Generator as Faker;

$factory->define(County::class, function (Faker $faker) {

    $counties = [
        'Baringo',
        'Bomet',
        'Bungoma',
        'Busia',
        'Elegeyo Marakwet',
        'Embu',
        'Garrisa',
        'Homa Bay',
        'Isiolo',
        'Kajiado',
        'Kakamega',
        'Kericho',
        'Kiambu',
        'Kilifi',
        'Kirinyaga',
        'Kisii',
        'Kisumu',
        'Kitui',
        'Kwale',
        'Laikipia',
        'Lamu',
        'Machakos',
        'Makueni',
        'Mandera',
        'Marsabit',
        'Meru',
        'Migori',
        'Mombasa',
        'Murang\'a',
        'Nairobi',
        'Nakuru',
        'Nandi',
        'Marok',
        'Nyamira',
        'Nyandarua',
        'Nyeri',
        'Samburu',
        'Siaya',
        'Taita Taveta',
        'Tana River',
        'Tharaka Nithi',
        'Trans Nzoia',
        'Turkana',
        'Uasin Gishu',
        'Vihiga',
        'Wajir',
        'West Pokot',
    ];

    $regions = [
        'Western',
        'Rift Valley',
        'Central',
        'Coast',
        'Nairobi',
        'Eastern',
        'North Eastern',
    ];


    return [
        'name' => $faker->randomElement($counties),
        'region' => $faker->randomElement($regions),
    ];
});
