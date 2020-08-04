<?php

namespace Tests\Feature;

use App\Ward;
use App\County;
use App\Country;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationsApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @group api
     */
    public function one_can_get_the_country(){

        $this->withoutExceptionHandling();
        
        factory(Country::class)->create();
        
        $this->getJson('/api/locations')
             ->assertOk();
    }

    /**
     * @test
     * @group api
     */
    public function one_can_get_all_the_counties()
    {
        $this->withoutExceptionHandling();
        
        factory(Country::class)->create();

        factory(County::class)->create();
        factory(County::class)->create();

        $this->getJson('/api/locations/counties')
             ->assertOk();
    }

    /**
     * @test
     * @group
     */
    public function one_can_get_all_the_constituencies()
    {
        $this->withoutExceptionHandling();

        $this->getJson('/api/locations/constituencies')
             ->assertOk();
    }

    /**
     * @test
     * @group api
     */
    public function one_can_get_all_the_wards()
    {
        $this->withoutExceptionHandling();

        $this->getJson('/api/locations/wards')
             ->assertOk();
    }  
    
    /**
     * @test
     * @group api
     */
    public function one_can_get_a_reversed_location_object_from_ward()
    {
        $this->withoutExceptionHandling();

        $ward = factory(Ward::class)->create();

        $this->getJson('/api/locations/wards/' . $ward->id)
            ->assertOk();
    }
}
