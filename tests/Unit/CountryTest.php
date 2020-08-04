<?php

namespace Tests\Unit;

use App\Country;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @group country
     */
    public function only_one_coutry_will_be_created()
    {
        Country::firstOrCreate(['name' => 'Kenya']);
        
        $this->assertCount(1, Country::all());

        Country::firstOrCreate(['name' => 'Kenya']);
        
        $this->assertCount(1, Country::all());


    }
}
