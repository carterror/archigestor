<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function loginTest()
    {
        // Context
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123*'), // password
        ]);


        // Actions

        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'admin123*'
        ]);

        // Response

        $response->assertStatus(302);
        $this->assertTrue(Auth::check());
        $this->assertEquals('admin', Auth::user()->name);


    }
}
