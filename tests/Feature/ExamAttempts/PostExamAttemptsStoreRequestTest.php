<?php

namespace Tests\Feature\ExamAttempts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostExamAttemptsStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ExamAttempts_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
