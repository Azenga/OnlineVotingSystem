<?php

namespace Tests\Feature;

use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesPermissionsManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @group permission_role
     */
    public function a_permission_can_be_deleted_from_a_role()
    {
        $role = factory(Role::class)->create();

        $permissions = factory(Permission::class, 5)->create();

        $role->permissions()->sync($permissions);

        $this->assertCount(5, $role->fresh()->permissions);

        $this->assertCount(1, Permission::first()->roles);

        $this->delete('/admin/roles/' . $role->id . '/permissions/' . Permission::first()->id)
             ->assertRedirect('/admin/roles/' . $role->id);

        $this->assertCount(4, $role->fresh()->permissions);

    }

}
