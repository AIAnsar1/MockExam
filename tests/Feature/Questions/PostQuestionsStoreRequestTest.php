<?php

namespace Tests\Feature\Questions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostQuestionsStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Questions_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
