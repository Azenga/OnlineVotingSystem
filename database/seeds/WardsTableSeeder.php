<?php

use App\Ward;
use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 150; $i++) { 

            factory(Ward::class)->create([
                'constituency_id' => rand(1, 100),
            ]);
            
        }
    }
}
