<?php

namespace Tests\Unit;

use App\User;
use App\Station;
use Tests\TestCase;
use App\StationWorker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationWorkerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group station
     */
    public function a_station_woker_relationship_can_be_created()
    {

        $users = factory(User::class, 3)->create();

        $station = factory(Station::class)->create();

        $users = $users->pluck('id')->toArray();

        foreach ($users as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);
        }

        $this->assertCount(count($users), StationWorker::all());

        $this->assertCount(count($users), $station->fresh()->workers);
        
    }

}
