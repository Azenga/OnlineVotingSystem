<?php

namespace Tests\Unit;

use App\Station;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     * @group station
     */
    public function a_polling_stationcan_added()
    {
        $station = factory(Station::class)->create();

        $this->assertCount(1, Station::all());

        $this->assertEquals($station->name, Station::first()->name);
    }

    /**
     * @test
     * @group station
     */
    public function a_name_is_required()
    {
        $this->expectException(\Exception::class);

        $station = factory(Station::class)->create(['name' => null]);

        $this->assertCount(0, Station::all());

    }
}
