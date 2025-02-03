<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Plan;
use App\Models\UseCase;
use App\Models\Language;
use App\Models\AiChatHistory;
use App\Models\ContentHistory;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;

class OpenAiControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_content_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('content.create'));
        $response->assertStatus(200);
        $response->assertViewIs('user.openAi.content');
    }

    /** @test */
    public function it_generates_content_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $useCase = UseCase::factory()->create(['prompt' => 'Test prompt']);
        $plan = Plan::factory()->create(['max_words' => 1000]);

        $user->plan_id = $plan->id;
        $user->save();

        $response = $this->postJson('/user/openai/content/generate', [
            'use_case' => $useCase->id,
            'temp' => 0.7,
            'max_words' => 100,
            'quantity' => 1,
            'title' => 'Test Title',
            'short_description' => 'Test short description',
            'description' => 'Test description',
            'tone' => 'neutral',
            'language' => 'en',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['content', 'words', 'characters']);
    }

    /** @test */
    public function it_fails_to_generate_content_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/user/openai/content/generate', [
            'use_case' => '',
            'temp' => '',
            'max_words' => '',
            'quantity' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => true,
        ]);
    }

    /** @test */
    public function it_shows_image_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/user/openai/image');
        $response->assertStatus(200);
        $response->assertViewIs('user.openAi.image');
    }

    /** @test */
    public function it_generates_image_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $plan = Plan::factory()->create(['image' => 10]);

        $user->plan_id = $plan->id;
        $user->save();

        $response = $this->post('/user/openai/image/generate', [
            'prompt' => 'A scenic landscape',
            'quantity' => 1,
            'image_size' => '1024x1024',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('images', ['prompt' => 'A scenic landscape']);
    }

    /** @test */
    public function it_fails_to_generate_image_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/user/openai/image/generate', [
            'prompt' => '',
            'quantity' => '',
            'image_size' => '',
        ]);

        $response->assertSessionHasErrors(['prompt', 'quantity', 'image_size']);
    }

    /** @test */
    public function it_generates_code_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $plan = Plan::factory()->create(['max_words' => 1000]);
        $user->plan_id = $plan->id;
        $user->save();

        $response = $this->postJson('/user/openai/code/generate', [
            'description' => 'Write a function to add two numbers',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['content', 'words', 'characters']);
    }

    /** @test */
    public function it_fails_to_generate_code_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/user/openai/code/generate', [
            'description' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => true,
        ]);
    }

    /** @test */
    public function it_generates_chat_response_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $plan = Plan::factory()->create(['max_words' => 1000]);
        $user->plan_id = $plan->id;
        $user->save();

        $response = $this->postJson('/user/openai/chat/response', [
            'description' => 'Tell me a joke',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['content']);
    }

    /** @test */
    public function it_fails_to_generate_chat_response_with_invalid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/user/openai/chat/response', [
            'description' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => true,
        ]);
    }
}