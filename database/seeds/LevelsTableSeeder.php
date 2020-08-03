<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (['Country', 'County', 'Constituency', 'Ward'] as $value) {
            factory(\App\Level::class)->create(['title' => $value]);
        }
    }
}
