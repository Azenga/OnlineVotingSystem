<?php

namespace Tests\Feature;

use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionManagementTest extends TestCase
{
    use RefreshDatabase;
   
    /**
     * @test
     * @group permission
     */
    public function admin_can_view_permissions()
    {
        $this->withoutExceptionHandling();
        
        $this->get('/admin/permissions')
             ->assertOk()
             ->assertViewIs('admin.permissions.index')
             ->assertViewHas('permissions');
    }

    /**
     * @test
     * @group permission
     */
    public function admin_can_view_create_permission_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/permissions/create')
             ->assertOk()
             ->assertViewIs('admin.permissions.create');
    }

    public function admin_can_view_a_single_permission_page()
    {
        $permission = factory(Permission::class)->create();

        $this->get($permission->path())
             ->assertOk()
             ->assertViewIs('admin.permissions.show')
             ->assertViewHas('permission');
    }

    /**
     * @test
     * @group permission
     */
    public function admin_can_add_a_permission()
    {
        $this->withoutExceptionHandling();

        $data = factory(Permission::class)->make()->toArray();

        $this->post('/admin/permissions', $data)
             ->assertRedirect('/admin/permissions');

        $this->assertCount(1, Permission::all());
    }

    /**
     * @test
     * @group permission
     */
    public function verify_permission_title_is_required()
    {
        $data = factory(Permission::class)->make(['title' => ''])->toArray();

        $this->post('/admin/permissions', $data)
                ->assertSessionHasErrors('title');
    
        
        $this->assertCount(0, Permission::all());
    }

    public function admin_can_view_permission_edit_page()
    {

        $permission = factory(Permission::class)->create();

        $this->get('/admin/permissions/' . $permission->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.permissions.edit')
             ->assertViewHasAll(['permission']);
    }

    public function admin_can_update_permission_details()
    {
        $this->withoutExceptionHandling();

        factory(Permission::class)->create();

        $permission = factory(Permission::class)->make();

        $this->patch(Permission::first()->path(), $permission->toArray())
             ->assertRedirect(Permission::first()->path());

        $this->assertCount(1, Permission::all());

        $this->assertEquals($permission->title, Permission::first()->title);
        $this->assertEquals($permission->description, Permission::first()->description);
    }

    /**
     * @test
     * @group permission
     */
    public function admin_can_delete_a_permission()
    {        
        $this->withoutExceptionHandling();
        
        factory(Permission::class)->create();

        $this->delete(Permission::first()->path())
             ->assertRedirect('/admin/permissions');

        $this->assertCount(0, Permission::all());
    }

}
