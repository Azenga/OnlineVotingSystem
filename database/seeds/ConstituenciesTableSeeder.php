<?php

use App\Constituency;
use Illuminate\Database\Seeder;

class ConstituenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($count=0; $count < 100; $count++) { 

            factory(Constituency::class)->create([
                'county_id' => rand(1, 47),
            ]);
            
        }

    }
}
