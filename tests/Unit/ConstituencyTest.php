<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Constituency;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConstituencyTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test
     * @group constituency
     */
    public function a_constituency_can_be_created()
    {
        $constituency = factory(Constituency::class)->create();

        $this->assertCount(1, Constituency::all());

        $this->assertEquals($constituency->name, Constituency::first()->name);
        $this->assertEquals($constituency->county_id, Constituency::first()->county_id);
        $this->assertEquals($constituency->description, Constituency::first()->description);

    }

    /**
     * @test
     * @group constituency
     */
    public function a_constituency_name_is_required()
    {

        $this->expectException(\Exception::class);

        factory(Constituency::class)->create(['name' => null]);

    }


    /**
     * @test
     * @group constituency
     */
    public function a_county_id_is_required()
    {

        $this->expectException(\Exception::class);

        factory(Constituency::class)->create(['county_id' => null]);

    }    
}
