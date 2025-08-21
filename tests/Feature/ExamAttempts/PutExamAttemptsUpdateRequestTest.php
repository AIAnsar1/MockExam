<?php

namespace Tests\Feature\ExamAttempts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutExamAttemptsUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ExamAttempts_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
