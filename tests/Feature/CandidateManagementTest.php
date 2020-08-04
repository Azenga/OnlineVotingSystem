<?php

namespace Tests\Feature;

use App\Vie;
use App\Role;
use App\User;
use App\Ward;
use App\Position;
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

    /**
     * @test
     * 
     * @group candidate
     */
    public function one_can_add_a_candidate()
    {
        $this->withoutExceptionHandling();

        $this->post('/admin/candidates', array_merge(
            factory(User::class)->make()->toArray(),
            ['position_id' => $position_id = factory(Position::class)->create()->id]
        ))->assertRedirect('/admin/candidates');

        $this->assertCount(1, User::all());
        $this->assertEquals(2, User::first()->role_id);
        $this->assertEquals(User::first()->candidature->position_id, $position_id);
    }

    /**
     * @test
     * @group candidate
     */
    public function verify_the_required_fields()
    {
        $fields = [
            'name', 'email', 'phone_number', 'national_id_number', 
            'ward_id', 'position_id'
        ];

        foreach ($fields as $field) {
            $this->post('/admin/candidates', array_merge(
                factory(User::class)->make()->toArray(),
                ['position_id' => factory(Position::class)->create()->id],
                [$field => '']
            ))->assertSessionHasErrors($field);
        }
    }
}
