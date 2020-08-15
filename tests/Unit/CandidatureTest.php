<?php

namespace Tests\Unit;

use App\User;
use App\Position;
use Tests\TestCase;
use App\Candidature;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CandidatureTest extends TestCase
{
    
    use RefreshDatabase;
    
    /**
     * @test
     * @group candidature
     * 
     */
    public function candidature_can_be_created()
    {
        $candidature = factory(Candidature::class)->create();

        $this->assertCount(1, Candidature::all());
        

        $this->assertTrue(User::all()->count() > 0);
        $this->assertTrue(Position::all()->count() > 0);

        $this->assertEquals($candidature->user_id, User::first()->id);
        $this->assertEquals($candidature->position_id, Position::first()->id);
    }

    /**
     * @test
     * @group candidature
     */
    public function user_id_is_required()
    {
        $this->expectException(\Exception::class);

        $candidature = factory(Candidature::class)->create(['user_id' => null]);

        $this->assertCount(0, Candidature::all());
    }


    /**
     * @test
     * @group candidature
     */
    public function position_id_is_required()
    {
        $this->expectException(\Exception::class);

        $candidature = factory(Candidature::class)->create(['position_id' => null]);

        $this->assertCount(0, Candidature::all());
    }

    /**
     * @test
     * @group candidature
     */
    public function running_mate_id_is_optional()
    {

        $candidature = factory(Candidature::class)->create(['running_mate_id' => null]);

        $this->assertCount(1, Candidature::all());

        $this->assertNull(Candidature::first()->running_mate_id);
    }    

    /**
     * @test
     * 
     * @group candidature
     */
    public function location_id_is_required()
    {
        $this->expectException(\Exception::class);

        $candidature = factory(Candidature::class)->create(['location_id' => null]);
    }

}
