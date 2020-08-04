<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidatureManagementTest extends TestCase
{

    /**
     * @test
     * @group candidate
     */
    public function one_can_view_create_candidate_from_user_page()
    {
        $this->get('/')
             ->assertOk();
    }
    
}
