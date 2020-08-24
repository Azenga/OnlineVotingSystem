<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VotingResultsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->be(factory(User::class)->create());
    }
    
    /**
     * @test
     * 
     * @group results
     */
    public function admin_can_view_voting_progess()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/results')
            ->assertOk();
    }

}
