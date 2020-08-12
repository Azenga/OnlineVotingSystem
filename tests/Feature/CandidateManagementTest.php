<?php

namespace Tests\Feature;

use App\Vie;
use App\Role;
use App\User;
use App\Ward;
use App\Position;
use Tests\TestCase;
use App\Candidature;
use PermissionsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidateManagementTest extends TestCase
{

    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        factory(Role::class, 5)->create();

        $this->seed(PermissionsTableSeeder::class);

        $user = factory(User::class)->create(['role_id' => 5]);

        $this->be($user);
        
    }
    
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

    /**
     * @test
     * 
     * @group candidate
     */
    public function admin_can_view_a_candidate_page()
    {
        $this->withoutExceptionHandling();

        factory(Role::class)->create();

        factory(Role::class)->create();

        $this->post('/admin/candidates', array_merge(
            factory(User::class)->make()->toArray(),
            ['position_id' => $position_id = factory(Position::class)->create()->id]
        ));
        
        $response = $this->get('/admin/candidates/' . User::query()->role(Role::findOrFail(2))->get()->first()->id);
        $response->assertOk();
        $response->assertViewIs('admin.candidates.show');
        $response->assertViewHas('user');

    }

    /**
     * @test
     * @group candidate
     */
    public function admin_can_view_candidate_edit_page()
    {
        $this->withoutExceptionHandling();

        factory(Role::class)->create();

        factory(Role::class)->create();

        $this->post('/admin/candidates', array_merge(
            factory(User::class)->make()->toArray(),
            ['position_id' => $position_id = factory(Position::class)->create()->id]
        ));

        $this->get('/admin/candidates/' . User::first()->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.candidates.edit')
             ->assertViewHasAll(['user', 'positions']);
    }

    /**
     * @test
     * @group candidate
     */
    public function admin_can_update_candidate_details()
    {
        $this->withoutExceptionHandling();

        factory(Role::class)->create();

        factory(Role::class)->create();


        $this->post('/admin/candidates', array_merge(
            factory(User::class)->make()->toArray(),
            ['position_id' => $position_id = factory(Position::class)->create()->id]
        ));

        $position = factory(Position::class)->create();

        $runningMate = factory(User::class)->create();

        
        $this->patch('/admin/candidates/' . User::first()->id, [
            'position_id' => $position->id,
            'running_mate_id' => $runningMate->id,
            'party' => 'JAP',
            'incumbent' => 'on'
        ])->assertRedirect('/admin/candidates/' . User::first()->id);

        $this->assertEquals(User::first()->candidature->position_id, $position->id);
        $this->assertEquals(User::first()->candidature->running_mate_id, $runningMate->id);
        $this->assertEquals(User::first()->candidature->party, 'JAP');
        $this->assertTrue((bool)User::first()->candidature->incumbent);
        
    }


    /**
     * @test
     * 
     * @group candidate
     */
    public function admin_can_revoke_candidature()
    {        
        $this->withoutExceptionHandling();
        
        factory(Role::class)->create();

        factory(Role::class)->create();


        $this->post('/admin/candidates', array_merge(
            factory(User::class)->make()->toArray(),
            ['position_id' => $position_id = factory(Position::class)->create()->id]
        ));

        $this->delete('/admin/candidates/' . User::first()->id)
             ->assertRedirect('/admin/candidates');

        $this->assertCount(0, Candidature::all());
        
        $this->assertEquals(1, User::first()->role_id);

        $this->assertCount(1, User::all());
    }

}
