<?php

namespace Tests\Unit;

use App\Vie;
use App\Ward;
use App\County;
use Tests\TestCase;
use App\Candidature;
use App\Constituency;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group vies
     */
    public function a_ward_can_be_vyed_for()
    {
        $candidature = factory(Candidature::class)->create();

        $ward = factory(Ward::class)->create();

        $ward->vyings()->create([
            'candidature_id' => $candidature->id,
        ]);

        $this->assertCount(1, Vie::all());

        $this->assertEquals($candidature->id, Vie::first()->candidature_id);
        $this->assertEquals('App\Ward', Vie::first()->vieable_type);
        $this->assertEquals($ward->id, Vie::first()->vieable_id);
    }

    /**
     * @test
     * @group vies
     */
    public function a_constituency_can_be_vyed_for()
    {
        $candidature = factory(Candidature::class)->create();

        $constituency = factory(Constituency::class)->create();

        $constituency->vyings()->create([
            'candidature_id' => $candidature->id,
        ]);

        $this->assertCount(1, Vie::all());

        $this->assertEquals($candidature->id, Vie::first()->candidature_id);
        $this->assertEquals('App\Constituency', Vie::first()->vieable_type);
        $this->assertEquals($constituency->id, Vie::first()->vieable_id);
    }   
    
    /**
     * @test
     * @group vies
     */
    public function a_county_can_be_vyed_for()
    {
        $candidature = factory(Candidature::class)->create();

        $county = factory(County::class)->create();

        $county->vyings()->create([
            'candidature_id' => $candidature->id,
        ]);

        $this->assertCount(1, Vie::all());

        $this->assertEquals($candidature->id, Vie::first()->candidature_id);
        $this->assertEquals('App\County', Vie::first()->vieable_type);
        $this->assertEquals($county->id, Vie::first()->vieable_id);
        $this->assertEquals(now()->format('m/d/Y'), Vie::first()->created_at->format('m/d/Y'));
    }   
    
    /**
     * @test
     * @group vies
     */
    public function a_candidature_id_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        $candidature = factory(Candidature::class)->create();

        $county = factory(County::class)->create();

        $county->vyings()->create();

        $this->assertCount(0, Vie::all());
    }     

}
