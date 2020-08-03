<?php

namespace Tests\Unit;

use App\Ward;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WardTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @group ward
     */
    public function a_ward_can_be_created()
    {
        $ward = factory(Ward::class)->create();

        $this->assertCount(1, Ward::all());

        $this->assertEquals(Ward::first()->name, $ward->name);
        $this->assertEquals(Ward::first()->constituency_id, $ward->constituency_id);
        $this->assertEquals(Ward::first()->description, $ward->description);
    }

    /**
     * @test
     * @group ward
     */
    public function a_name_is_required()
    {

        $data = factory(Ward::class)->make(['name' => null])->toArray();

        $this->expectException(\Exception::class);

        Ward::create($data);

    }


    /**
     * @test
     * @group ward
     */
    public function a_constituency_id_is_required()
    {

        $data = factory(Ward::class)->make(['constituency_id' => null])->toArray();

        $this->expectException(\Exception::class);

        Ward::create($data);

    }    



    /**
     * @test
     * @group ward
     */
    public function a_description_is_optional()
    {

        $data = factory(Ward::class)->make(['description' => null])->toArray();

        Ward::create($data);

        $this->assertCount(1, Ward::all());

    }    
}
