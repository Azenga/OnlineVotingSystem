<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 200; $i++) { 

            srand(time());

            factory(User::class)->create([
                'role_id' => rand(1, 5),
                'ward_id' => rand(1, 150),
            ]);
        }
            
        srand(time());
        
        factory(User::class)->create([
            'name' => 'Azenga Kevin',
            'email' => 'azenga.kevin7@gmail.com',
            'role_id' => 1,
            'ward_id' => rand(1, 150),
        ]);
    }
}
