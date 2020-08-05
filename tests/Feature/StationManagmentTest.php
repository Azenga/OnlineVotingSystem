<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use App\Station;
use Tests\TestCase;
use App\StationWorker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationManagmentTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @group station
     */
    public function admin_can_view_available_stations()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/stations')
             ->assertOk()
             ->assertViewIs('admin.stations.index')
             ->assertViewHas('stations');
    }
    

    /**
     * @test
     * @group station
     */
    public function admin_can_view_add_station_page()
    {
        $this->withoutExceptionHandling();

        factory(User::class, 3)->create();

        $this->get('/admin/stations/create')
             ->assertOk()
             ->assertViewIs('admin.stations.create')
             ->assertViewHas('users');
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_view_a_station_page()
    {
        $this->withoutExceptionHandling();

        $station = factory(Station::class)->create();

        $this->get($station->path())
             ->assertOk()
             ->assertViewIs('admin.stations.show')
             ->assertViewHas('station');
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_add_a_station()
    {
        $this->withoutExceptionHandling();

        $users = factory(User::class, 3)->create();

        $usersIds = $users->pluck('id')->toArray();

        $this->post('/admin/stations', array_merge(
            factory(Station::class)->make()->toArray(),
            ['users_ids' => $usersIds]
        ))->assertRedirect('/admin/stations');

        $this->assertCount(1, Station::all());

        $this->assertCount(3, StationWorker::all());

        $this->assertCount(3, Station::first()->workers);
    }

    /**
     * @test
     * 
     * @group station
     */
    public function verify_station_name_is_required()
    {
        $data = factory(Station::class)->make()->toArray();

        $this->post('/admin/stations', array_merge($data, ['name' => '']))
                ->assertSessionHasErrors('name');
    
        
        $this->assertCount(0, Station::all());
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_view_station_edit_page()
    {   
        $this->withoutExceptionHandling();

        factory(Role::class, 3)->create();

        $station = factory(Station::class)->create();

        $this->get('/admin/stations/' . $station->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.stations.edit')
             ->assertViewHasAll(['station', 'users']);
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_update_station_details()
    {
        $this->withoutExceptionHandling();

        $users = factory(User::class, 3)->create();

        $station = factory(Station::class)->create();

        $users = $users->pluck('id')->toArray();

        foreach ($users as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);
        }

        $station = factory(Station::class)->make();

        $this->patch(Station::first()->path(), array_merge(
            $station->toArray(),
            ['users_ids' => array_slice($users, 0, 2)]
        ))->assertRedirect(Station::first()->path());

        $this->assertCount(1, Station::all());

        $this->assertCount(2, StationWorker::all());

        $this->assertEquals($station->name, Station::first()->name);
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_delete_a_station()
    {        
        $this->withoutExceptionHandling();
        
        $users = factory(User::class, 3)->create();

        $station = factory(Station::class)->create();

        $users = $users->pluck('id')->toArray();

        foreach ($users as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);
        }

        $this->delete(Station::first()->path())
             ->assertRedirect('/admin/stations');

        $this->assertCount(0, Station::all());

        $this->assertCount(0, StationWorker::all());
    }

}
