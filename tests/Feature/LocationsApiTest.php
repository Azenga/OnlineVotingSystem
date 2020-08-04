<?php

namespace Tests\Feature;

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
        
        $this->getJson('/api/locations/country')
             ->assertOk();
    }
}
