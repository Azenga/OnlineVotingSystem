<?php

namespace Tests\Feature;

use App\Level;
use App\Position;
use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PositionManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @group position
     */
    public function one_can_view_postions()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/positions')
             ->assertOk()
             ->assertViewIs('admin.positions.index')
             ->assertViewHas('positions');
    }

    /**
     * @test
     * @group position
     */
    public function one_can_add_a_position(){

        $this->withoutExceptionHandling();

        $this->post('/admin/positions', factory(Position::class)->make()->toArray())
             ->assertRedirect('/admin/positions');

        $this->assertCount(1, Position::all());

        $this->assertTrue(Level::all()->count() > 0);

        $this->assertNotNull(Position::first()->level);

    }

    /**
     * @test 
     * @group position
     */
    public function a_title_and_level_are_required()
    {

        foreach (['title', 'level_id'] as $val) {

            $this->post('/admin/positions', array_merge(
                factory(Position::class)->make()->toArray(),
                [$val => null]
            ))->assertSessionHasErrors($val);

        }
        
        $this->assertCount(0, Position::all());
    }

    /** 
     * @test 
     * 
     * @group position
     * 
     */
    public function description_is_optional()
    {

        $this->withoutExceptionHandling();

        $this->post('/admin/positions', array_merge(
            factory(Position::class)->make()->toArray(),
            ['description' => null]
        ))->assertRedirect('/admin/positions');

        $this->assertCount(1, Position::all());

        $this->assertTrue(Level::all()->count() > 0);

        $this->assertNotNull(Position::first()->level);

        $this->assertNull(Position::first()->description);
    }

    /**
     * @test
     * @group position
     */
    public function one_can_view_the_create_position()
    {
        $this->withoutExceptionHandling();
        
        $this->get('/admin/positions/create')
             ->assertOk()
             ->assertViewIs('admin.positions.create')
             ->assertViewHas('levels');
    }

    /**
     * @test
     * @group position
     */
    public function one_can_view_a_position_show_page()
    {
        $position = factory(Position::class)->make();

        $position->save();
        
        $this->get(Position::first()->path())
             ->assertOk()
             ->assertViewIs('admin.positions.show')
             ->assertViewHas('position');


    }


    /**
     * @test
     * @group position
     */
    public function one_can_view_a_position_edit_page()
    {
        $this->withoutExceptionHandling();

        $position = factory(Position::class)->make();

        $position->save();
        
        $this->get('/admin/positions/' . Position::first()->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.positions.edit')
             ->assertViewHas(['position', 'levels']);


    }    


    /**
     * @test
     * @group position
     */
    public function one_can_update_a_position()
    {
        $this->withoutExceptionHandling();

        $position = factory(Position::class)->make();

        $position->save();


        $this->patch(Position::first()->path(), array_merge(
            $position->toArray(), 
            ['title' => 'New Title']
        ))->assertRedirect(Position::first()->path());

        $this->assertCount(1, Position::all());

        $this->assertTrue(Level::all()->count() > 0);

        $this->assertNotNull(Position::first()->level);

        $this->assertEquals('New Title', Position::first()->title);

    }

    /**
     * @test
     * @group position
     */
    public function one_can_delete_a_position()
    {
        $this->withoutExceptionHandling();

        $position = factory(Position::class)->make();

        $position->save();


        $this->delete(Position::first()->path())
             ->assertRedirect('/admin/positions');

        $this->assertCount(0, Position::all());

    }
}
