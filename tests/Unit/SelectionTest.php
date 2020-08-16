<?php

namespace Tests\Unit;

use App\Selection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SelectionTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * 
     * @group candidature
     */
    public function a_section_can_be_added()
    {
        Selection::create([
            'vote_id' => 1,
            'position_id' => 1,
            'location_id' => 1,
            'candidature_id' => 1
        ]);

        $this->assertCount(1, Selection::all());
    }
}
