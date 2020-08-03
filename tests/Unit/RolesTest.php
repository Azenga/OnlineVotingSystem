<?php

namespace Tests\Unit;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesTest extends TestCase
{

    use RefreshDatabase;
    
    /** 
     * @test
     * 
     * @group role
     * 
     */
    public function a_role_can_be_created()
    {
        $role = factory(Role::class)->create();

        $this->assertCount(1, Role::all());

        $this->assertEquals($role->title, Role::first()->title);
    }

    /**
     * @test
     * 
     * @group role
     */
    public function a_role_title_is_required()
    {
        $this->expectException(\Exception::class);
        
        $role = factory(Role::class)->create(['title' => null]);

        $this->assertCount(0, Level::all());

    }

    /**
     * @test
     * @group role
     */
    public function a_role_description_is_optional()
    {

        $data = factory(Role::class)->make(['description' => null])->toArray();

        Role::create($data);

        $this->assertCount(1, Role::all());

        $this->assertNull(Role::first()->description);

    }   

}
