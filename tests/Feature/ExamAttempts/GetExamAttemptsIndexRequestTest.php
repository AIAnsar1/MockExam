<?php

namespace Tests\Feature\ExamAttempts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetExamAttemptsIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ExamAttempts_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
