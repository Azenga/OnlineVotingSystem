<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use App\Station;
use Tests\TestCase;
use App\StationWorker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationWorkersManagmentTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * @test
     * @group officer
     */
    public function admin_can_view_officers()
    {
        $this->withoutExceptionHandling();

        //Officer Role 3
        //Voter Role 1
        $users = factory(User::class, 2)->create();

        factory(Role::class, 3)->create();

        $station = factory(Station::class)->create();

        $users = $users->pluck('id')->toArray();

        foreach ($users as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);

            User::findOrFail($value)->update(['role_id' => 3]);
            
        }

        $this->assertCount(count($users), StationWorker::all());

        $this->assertEquals(3, User::first()->role_id);
        $this->assertEquals(3, User::findOrFail(2)->role_id);

        $this->assertCount(count($users), $station->fresh()->workers);

        $this->get('/admin/officers')
             ->assertOk()
             ->assertViewIs('admin.officers.index')
             ->assertViewHas('users');

    }
    
    /**
     * @test
     * @group officer
     */
    public function admin_can_revoke_officership()
    {        
        $this->withoutExceptionHandling();

        $users = factory(User::class, 2)->create();

        factory(Role::class, 3)->create();

        $station = factory(Station::class)->create();

        $users = $users->pluck('id')->toArray();

        $users = array_slice($users, 0, 1);

        foreach ($users as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);

            User::findOrFail($value)->update(['role_id' => 3]);
            
        }

        $this->assertCount(1, $station->workers);
        
        $this->assertEquals(3, User::first()->role_id);

        $this->delete('/admin/officers/' . User::first()->id)
             ->assertRedirect('/admin/officers');

        $this->assertEquals(1, User::first()->role_id);

        $this->assertCount(0, StationWorker::all());

        $this->assertCount(0, $station->fresh()->workers);
        
    }

}
