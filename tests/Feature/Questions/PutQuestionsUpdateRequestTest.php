<?php

namespace Tests\Feature\Questions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutQuestionsUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Questions_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
