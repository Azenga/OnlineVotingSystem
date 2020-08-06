<?php

namespace Tests\Unit;

use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesPermissionsTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @group permission_role
     */
    public function a_role_permission_relationship_can_be_created()
    {
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 5)->create();

        $role->permissions()->sync($permissions);

        $this->assertCount(5, $role->fresh()->permissions);

        $this->assertCount(1, Permission::first()->roles);
    }
}
