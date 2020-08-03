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
        factory(Constituency::class, 5)->create();
    }
}
