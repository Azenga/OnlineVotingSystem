<?php

namespace Tests\Feature;

use App\Ward;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WardsManagmentTest extends TestCase
{


    use RefreshDatabase;
   
    /**
     * @test
     * @group ward
     */
    public function one_can_view_wards()
    {
        
        $this->get('/admin/wards')
             ->assertOk()
             ->assertViewIs('admin.wards.index')
             ->assertViewHas('wards');
    }

    /**
     * @test
     * 
     * @group ward
     */
    public function one_can_view_create_ward_page()
    {
        $this->get('/admin/wards/create')
             ->assertOk()
             ->assertViewIs('admin.wards.create')
             ->assertViewHas('constituencies');
    }

    /**
     * @test
     * @group ward
     */
    public function one_can_view_a_single_ward_page()
    {
        $ward = factory(Ward::class)->create();

        $this->get($ward->path())
             ->assertOk()
             ->assertViewIs('admin.wards.show')
             ->assertViewHas('ward');
    }

    /**
     * @test
     * @group ward
     */
    public function one_can_add_a_ward()
    {

        $data = factory(Ward::class)->make()->toArray();

        $this->post('/admin/wards', $data)
             ->assertRedirect('/admin/wards');

        $this->assertCount(1, Ward::all());
    }

    /**
     * @test
     * @group ward
     */
    public function verify_name_and_constituency_id_are_required()
    {
        $data = factory(Ward::class)->make()->toArray();

        foreach (['name', 'constituency_id'] as $value) {

            $this->post('/admin/wards', array_merge($data, [$value => '']))
                 ->assertSessionHasErrors($value);
    
        }
        
        $this->assertCount(0, Ward::all());
    }

    /**
     * @test
     * @group ward
     */
    public function one_can_view_ward_edit_page()
    {

        $ward = factory(ward::class)->create();

        $this->get('/admin/wards/' . $ward->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.wards.edit')
             ->assertViewHasAll(['ward', 'constituencies']);
    }

    /**
     * @test
     * @group ward
     */
    public function one_can_update_ward_details()
    {
        factory(Ward::class)->create();

        $ward = factory(Ward::class)->make();

        $this->patch(Ward::first()->path(), $ward->toArray())
             ->assertRedirect(Ward::first()->path());

        $this->assertCount(1, Ward::all());

        $this->assertEquals($ward->name, Ward::first()->name);
        $this->assertEquals($ward->county_id, Ward::first()->county_id);
        $this->assertEquals($ward->description, Ward::first()->description);
    }

    /**
     * @test
     * @group ward
     */
    public function one_can_delete_a_ward()
    {        
        $this->withoutExceptionHandling();
        
        factory(Ward::class)->create();

        $this->delete(Ward::first()->path())
             ->assertRedirect('/admin/wards');

        $this->assertCount(0, Ward::all());
    }
    
}
