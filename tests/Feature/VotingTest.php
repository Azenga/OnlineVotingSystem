<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VotingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group voting
     */
    public function one_must_be_logged_in_to_view_a_voting_page()
    {
        //$this->withoutExceptionHandling();

        $this->get('/vote')
            ->assertRedirect('/login');

    }

    /**
     * @test
     * @group voting
     */
    public function an_authenticated_user_can_view_the_voting_page()
    {
        $this->be(factory(User::class)->create());
        
        $this->get('/vote')
            ->assertOk();
    }
}
