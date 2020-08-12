<?php

namespace Tests\Unit;

use App\User;
use App\Vote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class VoteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group voting
     */
    public function user_vote_can_be_create()
    {
        $user = factory(User::class)->create();

        Vote::create([
            'user_id' => $user->id,
        ]);

        $this->assertCount(1, Vote::all());

        $this->assertEquals($user->id, Vote::first()->user_id);
    }

    /**
     * 
     * @test
     * 
     * @group voting
     */
    public function user_id_is_required()
    {
        $this->expectException(\Exception::class);
        
        Vote::create([]);
    }
}
