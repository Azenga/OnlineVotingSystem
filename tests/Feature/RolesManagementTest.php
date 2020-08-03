<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesManagementTest extends TestCase
{
    use RefreshDatabase;
   
    /**
     * @test
     * @group role
     */
    public function one_can_view_roles()
    {
        $this->withoutExceptionHandling();
        
        $this->get('/admin/roles')
             ->assertOk()
             ->assertViewIs('admin.roles.index')
             ->assertViewHas('roles');
    }

    /**
     * @test
     * @group role
     */
    public function one_can_view_create_role_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/roles/create')
             ->assertOk()
             ->assertViewIs('admin.roles.create');
    }

    /**
     * @test
     * @group role
     */
    public function one_can_view_a_single_role_page()
    {
        $role = factory(Role::class)->create();

        $this->get($role->path())
             ->assertOk()
             ->assertViewIs('admin.roles.show')
             ->assertViewHas('role');
    }

    /**
     * @test
     * @group role
     */
    public function one_can_add_a_role()
    {
        $this->withoutExceptionHandling();

        $data = factory(Role::class)->make()->toArray();

        $this->post('/admin/roles', $data)
             ->assertRedirect('/admin/roles');

        $this->assertCount(1, Role::all());
    }

    /**
     * @test
     * @group role
     */
    public function verify_title_is_required()
    {
        $data = factory(Role::class)->make()->toArray();

        $this->post('/admin/roles', array_merge($data, ['title' => '']))
                ->assertSessionHasErrors('title');
    
        
        $this->assertCount(0, Role::all());
    }

    /**
     * @test
     * @group role
     */
    public function one_can_view_role_edit_page()
    {

        $role = factory(Role::class)->create();

        $this->get('/admin/roles/' . $role->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.roles.edit')
             ->assertViewHasAll(['role']);
    }

    /**
     * @test
     * @group role
     */
    public function one_can_update_role_details()
    {
        $this->withoutExceptionHandling();

        factory(Role::class)->create();

        $role = factory(Role::class)->make();

        $this->patch(Role::first()->path(), $role->toArray())
             ->assertRedirect(Role::first()->path());

        $this->assertCount(1, Role::all());

        $this->assertEquals($role->title, Role::first()->title);
        $this->assertEquals($role->description, Role::first()->description);
    }

    /**
     * @test
     * @group
     */
    public function one_can_delete_a_role()
    {        
        $this->withoutExceptionHandling();
        
        factory(Role::class)->create();

        $this->delete(Role::first()->path())
             ->assertRedirect('/admin/roles');

        $this->assertCount(0, Role::all());
    }
}
