<?php

namespace Tests\Feature\Questions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteQuestionsDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Questions_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
