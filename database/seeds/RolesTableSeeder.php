<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'voter',
            'candidate', 
            'officer', 
            'admin',
            'super-admin', 
        ] as $value) {
            factory(Role::class)->create(['title' => $value]);
        }
    }
}
