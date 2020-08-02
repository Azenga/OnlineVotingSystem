<?php

namespace Tests\Unit;

use App\County;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountyTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test 
     * @group county
     */
    public function a_county_can_be_added()
    {
        $county = factory(County::class)->make();
        $county->save();

        $this->assertCount(1, County::all());

        $this->assertEquals($county->name, County::first()->name);
        $this->assertEquals($county->region, County::first()->region);

    }

    /**
     * @test
     * @group county
     * 
     */
    public function a_county_name_is_required()
    {

        $this->expectException(\Exception::class);

        factory(County::class)->create(['name' => null]);

    }

    /**
     * @test
     * @group county
     */
    public function a_county_region_is_optional()
    {
        $county = factory(County::class)->make(['region' => null]);

        $county->save();

        $this->assertCount(1, County::all());

        $this->assertEquals($county->name, County::first()->name);
        $this->assertNull(County::first()->region);        
    }
}
