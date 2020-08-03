<?php

use App\County;
use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        foreach ($counties as $value) {
            County::create([
                'name' => $value,
                'region' => $regions[rand(0, 6)],
            ]);
        }

    }
}
