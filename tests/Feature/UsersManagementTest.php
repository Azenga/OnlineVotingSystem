<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersManagementTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     * @group user
     */
    public function one_can_view_users()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/users')
             ->assertOk()
             ->assertViewIs('admin.users.index')
             ->assertViewHas('users');

    }

    /**
     * @test
     * @group user
     */
    public function one_can_view_create_user_page()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/users/create')
             ->assertOk()
             ->assertViewIs('admin.users.create')
             ->assertViewHas(['roles', 'wards']);
    }

    /**
     * @test
     * 
     * @group user
     */
    public function one_can_view_a_single_user_page()
    {
        $user = factory(User::class)->create();

        $this->get($user->path())
             ->assertOk()
             ->assertViewIs('admin.users.show')
             ->assertViewHas('user');
    }

    /**
     * @test
     * 
     * @group user
     */
    public function one_can_add_another_user()
    {
        $this->withoutExceptionHandling();

        $data = factory(User::class)->make()->toArray();

        $this->post('/admin/users', $data)
             ->assertRedirect('/admin/users');

        $this->assertCount(1, User::all());
    }

    /**
     * @test
     * @group user
     * 
     */
    public function verify_required_fields()
    {
        $data = factory(User::class)->make()->toArray();

        foreach (['name', 'phone_number', 'national_id_number', 'role_id', 'role_id', 'email'] as $value) {
            $this->post('/admin/users', array_merge($data, [$value => '']))
                 ->assertSessionHasErrors($value);
        }
        
        $this->assertCount(0, User::all());
    }

    /**
     * @test
     * @group user
     */
    public function one_can_view_user_edit_page()
    {
        $this->withoutExceptionHandling();

        $role = factory(User::class)->create();

        $this->get('/admin/users/' . $role->id . '/edit')
             ->assertOk()
             ->assertViewIs('admin.users.edit')
             ->assertViewHasAll(['user', 'roles', 'wards']);
    }

    /**
     * @test
     * @group user
     */
    public function one_can_update_another_user_details()
    {
        $this->withoutExceptionHandling();

        factory(User::class)->create();

        $user = factory(User::class)->make();

        $this->patch(User::first()->path(), $user->toArray())
             ->assertRedirect(User::first()->path());

        $this->assertCount(1, User::all());

        $this->assertEquals($user->name, User::first()->name);
        $this->assertEquals($user->email, User::first()->email);
        $this->assertEquals($user->phone_number, User::first()->phone_number);
        $this->assertEquals($user->national_id_number, User::first()->national_id_number);
        $this->assertEquals($user->role_id, User::first()->role_id);
    }

    /**
     * @test
     * @group user
     */
    public function one_can_delete_another_user()
    {        
        $this->withoutExceptionHandling();
        
        factory(User::class)->create();

        $this->delete(User::first()->path())
             ->assertRedirect('/admin/users');

        $this->assertCount(0, User::all());
    }

    
}
