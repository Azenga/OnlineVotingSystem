<?php

namespace Tests\Unit;

use App\Position;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PositionTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test
     * @group position
     */
    public function a_position_can_be_created()
    {
        $position = factory(Position::class)->make();

        $position->save();

        $this->assertCount(1, Position::all());

        $this->assertEquals($position->title, Position::first()->title);
        
    }

    /**
     * @test
     * @group position
     */
    public function a_position_title_is_required()
    {

        $this->expectException(\Illuminate\Database\QueryException::class);

        $position = factory(Position::class)->make(['title' => null]);

        $position->save();

    }

        /**
     * @test
     * @group position
     */
    public function a_position_level_is_required()
    {

        $this->expectException(\Illuminate\Database\QueryException::class);

        $position = factory(Position::class)->make(['level_id' => null]);

        $position->save();

    }


    /**
     * @test
     * @group position
     */
    public function a_position_description_is_optional()
    {

        $position = factory(Position::class)->make(['description' => null]);

        $position->save();

        $this->assertCount(1, Position::all());

        $this->assertNull(Position::first()->description);
        
    }    

}
