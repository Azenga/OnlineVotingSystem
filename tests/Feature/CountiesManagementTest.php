<?php

namespace Tests\Feature;

use App\County;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountiesManagementTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @group county
     */
    public function one_can_view_counties()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/counties')
             ->assertOk()
             ->assertViewIs('admin.counties.index')
             ->assertViewHas('counties');
    }

    /**
     * @test
     * @group county
     */
    public function one_can_view_create_county_page()
    {

        $this->withoutExceptionHandling();
        
        $this->get('/admin/counties/create')
             ->assertOk()
             ->assertViewIs('admin.counties.create');
    }

    /**
     * @test
     * @group county
     */
    public function one_can_add_a_county()
    {
        $this->post('/admin/counties', factory(County::class)->make()->toArray())
             ->assertRedirect('/admin/counties');

        $this->assertCount(1, County::all());
    }

    /**
     * @test
     * @group county
     */
    public function county_name_is_required()
    {
        $data = factory(County::class)->make(['name' => ''])->toArray();

        $this->post('/admin/counties', $data)
             ->assertSessionHasErrors('name');

        $this->assertCount(0, County::all());
    }

    /**
     * @test
     * @group county
     */
    public function one_can_view_county_info()
    {
        $this->withoutExceptionHandling();

        $county = factory(County::class)->make();
        $county->save();

        $this->get(County::first()->path())
             ->assertOk()
             ->assertViewIs('admin.counties.show')
             ->assertViewHas('county');

    }

    /**
     * @test
     * @group county
     */
    public function one_can_view_county_edit_page()
    {
        $this->withoutExceptionHandling();

        $county = factory(County::class)->make();
        $county->save();

        $this->get('/admin/counties/' . County::first()->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.counties.edit')
             ->assertViewHas('county');
    }

    /**
     * @test
     * 
     * @group county
     */
    public function one_can_update_county_details()
    {
        $this->withoutExceptionHandling();

        $county = factory(County::class)->make();
        $county->save();

        $this->patch(County::first()->path(), [
            'name' => 'New Name',
        ])->assertRedirect(County::first()->path());      

        $this->assertEquals(County::first()->name, 'New Name');
    }

    /**
     * @test
     * @group county
     */
    public function one_can_delete_county()
    {
        $this->withoutExceptionHandling();

        $county = factory(County::class)->make();
        $county->save();

        $this->assertCount(1, County::all());

        $this->delete(County::first()->path())
             ->assertRedirect('/admin/counties');

        $this->assertCount(0, County::all());
    }

}
