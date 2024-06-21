<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;
    protected $post;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->post = Post::factory()->create(['user_id' => $this->user->id]);
    }

    public function testDisplaysCreatePostPage()
    {
        $this->actingAs($this->user)
            ->get('/create-post')
            ->assertStatus(200);
    }

    public function testCreatesNewPostWithValidData()
    {
        $postData = [
            'title' => 'Test Post',
            'content' => 'This is a test post.',
        ];

        $response = $this->actingAs($this->user)
            ->post('/post/store', $postData);

        $response->assertStatus(302);
        $response->assertRedirect('/posts');

        $this->assertTrue(Post::where('title', 'Test Post')->exists());
    }

    public function testDoesNotCreateNewPostWithInvalidData()
    {
        $postData = [
            'title' => '',
            'content' => '',
        ];

        $response = $this->actingAs($this->user)
            ->post('/post/store', $postData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title', 'content']);
    }

    public function testUpdatesPostWithValidData()
    {
        $postData = [
            'title' => 'Updated Post',
            'content' => 'This is an updated post.',
        ];

        $response = $this->actingAs($this->user)
            ->put("/post/{$this->post->id}/update", $postData);

        $response->assertStatus(302);
        $response->assertRedirect("/post/{$this->post->id}");
        $this->assertEquals('Updated Post', $this->post->fresh()->title);
    }

    public function testDeletesPost()
    {
        $postCount = Post::count();

        $response = $this->actingAs($this->user)
            ->delete("/post/{$this->post->id}/delete");

        $response->assertStatus(302);
        $response->assertRedirect('/posts');

        $this->assertEquals($postCount - 1, Post::count());
    }
}
