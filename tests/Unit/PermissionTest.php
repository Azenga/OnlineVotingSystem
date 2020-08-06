<?php

namespace Tests\Unit;

use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @group permission
     */
    public function a_permission_can_be_created()
    {

        $permission = factory(Permission::class)->create();

        $this->assertCount(1, Permission::all());

        $this->assertEquals($permission->title, Permission::first()->title);
    }

    /**
     * @test
     * @group permission
     */
    public function permission_title_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        $permission = factory(Permission::class)->create(['title' => null]);

        $this->assertCount(0, Permission::all());
    }
}
