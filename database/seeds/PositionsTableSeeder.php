<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $positions = [
            'President', 
            'Governor', 'Senetor', 
            'Women Representative', 
            'Member Of Parliament', 
            'Member of County Assembly'
        ];

        foreach ($positions as $value) {

            srand(time());
            
            factory(Position::class)->create([
                'title' => $value,
                'level_id' => rand(1, 5),
            ]);
        }
    }
}
