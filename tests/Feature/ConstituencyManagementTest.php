<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Constituency;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConstituencyManagementTest extends TestCase
{

    use RefreshDatabase;
   
    /**
     * @test
     * @group constituency
     */
    public function one_can_view_constituencies()
    {
        $this->get('/admin/constituencies')
             ->assertOk()
             ->assertViewIs('admin.constituencies.index')
             ->assertViewHas('constituencies');
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_view_create_constituency_page()
    {
        $this->get('/admin/constituencies/create')
             ->assertOk()
             ->assertViewIs('admin.constituencies.create')
             ->assertViewHas('counties');
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_view_a_single_constituency_page()
    {
        $constituency = factory(Constituency::class)->create();

        $this->get($constituency->path())
             ->assertOk()
             ->assertViewIs('admin.constituencies.show')
             ->assertViewHas('constituency');
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_add_a_constituency()
    {

        $data = factory(Constituency::class)->make()->toArray();

        $this->post('/admin/constituencies', $data)
             ->assertRedirect('/admin/constituencies');

        $this->assertCount(1, Constituency::all());
    }

    /**
     * @test
     * @group constituency
     */
    public function check_name_and_county_id_are_required()
    {
        $data = factory(Constituency::class)->make()->toArray();

        foreach (['name', 'county_id'] as $value) {

            $this->post('/admin/constituencies', array_merge($data, [$value => '']))
                 ->assertSessionHasErrors($value);
    
        }
        
        $this->assertCount(0, Constituency::all());
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_view_constituency_edit_page()
    {

        $constituency = factory(Constituency::class)->create();

        $this->get('/admin/constituencies/' . $constituency->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.constituencies.edit')
             ->assertViewHasAll(['constituency', 'counties']);
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_update_constituency_details()
    {
        factory(Constituency::class)->create();

        $constituency = factory(Constituency::class)->make();

        $this->patch(Constituency::first()->path(), $constituency->toArray())
             ->assertRedirect(Constituency::first()->path());

        $this->assertCount(1, Constituency::all());

        $this->assertEquals($constituency->name, Constituency::first()->name);
        $this->assertEquals($constituency->county_id, Constituency::first()->county_id);
        $this->assertEquals($constituency->description, Constituency::first()->description);
    }

    /**
     * @test
     * @group constituency
     */
    public function one_can_delete_a_constituency()
    {        
        $this->withoutExceptionHandling();
        
        factory(Constituency::class)->create();

        $this->delete(Constituency::first()->path())
             ->assertRedirect('/admin/constituencies');

        $this->assertCount(0, Constituency::all());
    }
    
}
