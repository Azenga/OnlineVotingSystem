<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateManagementTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test
     * @group candidate
     */
    public function admin_can_view_candidates()
    {
        $this->withoutExceptionHandling();

        factory(Role::class, 5)->create();

        $this->get('/admin/candidates')
             ->assertOk()
             ->assertViewIs('admin.candidates.index')
             ->assertViewHas('users');

    }
    
    /**
     * @test
     * @group candidate
     */
    public function one_can_view_create_candidate_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/candidates/create')
             ->assertOk()
             ->assertViewIs('admin.candidates.create');
    }
}
