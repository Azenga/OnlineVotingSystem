<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionApiTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test
     *
     * @group api
     */
    public function one_can_get_all_postions()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->get('/api/positions');

        $response->assertStatus(200);
    }
}
