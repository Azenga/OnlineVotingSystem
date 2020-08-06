<?php

namespace Tests\Feature;

use App\Role;
use App\Permission;
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
    public function admin_can_view_roles()
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
    public function admin_can_view_create_role_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/roles/create')
             ->assertOk()
             ->assertViewIs('admin.roles.create')
             ->assertViewHas('permissions');
    }

    /**
     * @test
     * @group role
     */
    public function admin_can_add_a_role()
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->make()->toArray();

        $permissions = factory(Permission::class, 3)->create();

        $data = array_merge($role,[
            'permissions_ids' => $permissions->pluck('id')->toArray()
        ]);

        $this->post('/admin/roles', $data)
             ->assertRedirect('/admin/roles');

        $this->assertCount(1, Role::all());

        $this->assertCount(3, Role::first()->permissions);
    }    

    /**
     * @test
     * @group role
     */
    public function admin_can_view_a_single_role_page()
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
    public function admin_can_view_role_edit_page()
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();

        $this->get('/admin/roles/' . $role->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.roles.edit')
             ->assertViewHasAll(['role', 'permissions']);
    }

    /**
     * @test
     * @group role
     */
    public function admin_can_update_role_details()
    {
        $this->withoutExceptionHandling();

        //Initial role
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 3)->create();
        $role->permissions()->sync($permissions);

        //Updated role
        $role = factory(Role::class)->make();

        $permissions = array_slice($permissions->pluck('id')->toArray(), 0, 2);

        $data = array_merge($role->toArray(), [
            'permissions_ids' => $permissions
        ]);

        $this->patch(Role::first()->path(), $data)
             ->assertRedirect(Role::first()->path());

        $this->assertCount(1, Role::all());

        $this->assertEquals($role->title, Role::first()->title);
        $this->assertEquals($role->description, Role::first()->description);

        $this->assertCount(2, Role::first()->permissions);

    }

    /**
     * @test
     * @group
     */
    public function admin_can_delete_a_role()
    {        
        $this->withoutExceptionHandling();
        
        factory(Role::class)->create();

        $this->delete(Role::first()->path())
             ->assertRedirect('/admin/roles');

        $this->assertCount(0, Role::all());
    }
}
