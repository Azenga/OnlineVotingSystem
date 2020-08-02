<?php

namespace Tests\Unit;

use App\Level;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LevelTest extends TestCase
{

    use RefreshDatabase;
    
    /** 
     * @test
     * 
     * @group level
     * 
     */
    public function a_level_can_be_created()
    {
        Level::create([
            'title' => 'Country'
        ]);

        $this->assertCount(1, Level::all());

        $this->assertEquals('Country', Level::first()->title);
    }

    /**
     * @test
     * @group level
     */
    public function a_title_is_required()
    {
        $this->expectException(\Exception::class);

        Level::create([
            'title' => null
        ]);

        $this->assertCount(0, Level::all());

    }
}
