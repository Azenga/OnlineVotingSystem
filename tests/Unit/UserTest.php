<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
  
    use RefreshDatabase;
    /**
     * @test
     * @group user
     */
    public function a_user_can_be_created()
    {
        $user = factory(User::class)->create();

        $this->assertCount(1, User::all());

        $this->assertEquals($user->name, User::first()->name);
        $this->assertEquals($user->email, User::first()->email);
        $this->assertEquals($user->password, User::first()->password);
        $this->assertEquals($user->national_id_number, User::first()->national_id_number);
        $this->assertEquals($user->phone_number, User::first()->phone_number);
        $this->assertEquals($user->role_id, User::first()->role_id);

    }

}
