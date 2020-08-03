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

        for ($count=0; $count < 150 ; $count++) { 

            srand(time());

            factory(Ward::class)->create([
                'constituency_id' => rand(1, 99),
            ]);
        }
    }
}
