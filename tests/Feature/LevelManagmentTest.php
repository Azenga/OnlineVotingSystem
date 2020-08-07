<?php

namespace Tests\Feature;

use App\Level;
use Tests\TestCase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelManagmentTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @group level
     */
    public function levels_can_be_viewed()
    {

        $this->get('/admin/levels')
            ->assertOk();
    }

    /**
     * @test
     * @group level
     */
    public function a_level_can_be_created()
    {

        $this->post('/admin/levels', [
            'title' => 'Country'
        ]);

        $this->assertCount(1, Level::all());

        $this->assertEquals('Country', Level::first()->title);
    }

    /**
     * @test
     * 
     * @group level
     */
    public function a_title_is_required()
    {
        $this->post('/admin/levels', [
            'title' => ''
        ])->assertSessionHasErrors('title');

        $this->assertCount(0, Level::all());
    }

    /**
     * @test
     * 
     * @group level
     */
    public function a_level_can_be_updated()
    {
        
        $this->post('/admin/levels', [
            'title' => 'Country'
        ]);

        $this->assertCount(1, Level::all());

        $this->assertEquals('Country', Level::first()->title);  
        
        $this->patch(Level::first()->path(), [
            'title' => 'County'
        ]);

        $this->assertCount(1, Level::all());

        $this->assertEquals('County', Level::first()->title);  
    }

    /**
     * @test
     * @group level
     */
    public function a_level_can_be_deleted()
    {        
        $this->post('/admin/levels', [
            'title' => 'Country'
        ]);

        $this->assertCount(1, Level::all());

        $this->assertEquals('Country', Level::first()->title);  
        
        $this->delete(Level::first()->path());

        $this->assertCount(0, Level::all()); 
    }

    /** 
     * @test
     * 
     * @group level
     */
    public function create_level_page_can_be_visited()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/admin/levels/create');

        $response->assertOk();
    }


}
