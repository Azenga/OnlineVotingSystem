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
            UsersTableSeeder::class, 
            LevelsTableSeeder::class,
            PositionsTableSeeder::class,
            CountiesTableSeeder::class,
            ConstituenciesTableSeeder::class,
            WardsTableSeeder::class,
            RolesTableSeeder::class,
        ]);
    }
}
