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
        factory(User::class, 9)->create();
        
        factory(User::class)->create([
            'name' => 'Azenga Kevin',
            'email' => 'azenga.kevin7@gmail.com'
        ]);
    }
}
