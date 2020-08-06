<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            LevelsTableSeeder::class,
            PositionsTableSeeder::class,
            CountriesTableSeeder::class,
            CountiesTableSeeder::class,
            ConstituenciesTableSeeder::class,
            WardsTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
