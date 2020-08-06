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

    public function setUp():void
    {
        parent::setUp();

        $permissions = [
            //Roles
            'view_roles_page',
            'view_create_role_page',
            'store_role',
            'view_single_role_page',
            'view_edit_role_page',
            'update_role',
            'delete_role',
            
            //Permissions
            'view_permissions_page',
            'view_create_permission_page',
            'store_permission',
            'delete_permission',

            //Levels
            'view_levels_page',
            'view_create_level_page',
            'store_level',
            'view_single_level_page',
            'view_edit_level_page',
            'update_level',
            'delete_level',

            //Positions
            'view_positions_page',
            'view_create_position_page',
            'store_position',
            'view_single_position_page',
            'view_edit_position_page',
            'update_position',
            'delete_position',

            //Counties
            'view_counties_page',
            'view_create_county_page',
            'store_county',
            'view_single_county_page',
            'view_edit_county_page',
            'update_county',
            'delete_county',

            //Constituencies
            'view_constituencies_page',
            'view_create_constituency_page',
            'store_constituency',
            'view_single_constituency_page',
            'view_edit_constituency_page',
            'update_constituency',
            'delete_constituency',

            //Wards
            'view_wards_page',
            'view_create_ward_page',
            'store_ward',
            'view_single_ward_page',
            'view_edit_ward_page',
            'update_ward',
            'delete_ward',

            //Users
            'view_users_page',
            'view_create_user_page',
            'store_user',
            'view_single_user_page',
            'view_edit_user_page',
            'update_user',
            'delete_user',

            //Candidates
            'view_candidates_page',
            'view_create_candidate_page',
            'store_candidate',
            'view_single_candidate_page',
            'view_edit_candidate_page',
            'update_candidate',
            'delete_candidate',

            //Officers
            'view_officers_page',
            'view_create_officer_page',
            'store_officer',
            'view_single_officer_page',
            'view_edit_officer_page',
            'update_officer',
            'delete_officer',

            //Stations
            'view_stations_page',
            'view_create_station_page',
            'store_station',
            'view_single_station_page',
            'view_edit_station_page',
            'update_station',
            'delete_station',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['title' => $permission]);
        }

        Role::findOrFail(5)->permissions()->sync(
            Permission::pluck('id')->toArray()
        );
    }

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
