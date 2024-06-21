<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create(['password' => bcrypt('password')]);
    }

    public function testDisplaysLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testLogsInWithCorrectCredentials()
    {
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertTrue(Auth::check());
    }

    public function testDoesNotLogInWithIncorrectCredentials()
    {
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertFalse(Auth::check());
    }

    public function testNavigatesAsLoggedInUser()
    {
        $response = $this->actingAs($this->user)->get('/');
        $response->assertStatus(200);

        Auth::logout();

        $response = $this->get('/');
        $response->assertRedirect('/login');
    }
}
