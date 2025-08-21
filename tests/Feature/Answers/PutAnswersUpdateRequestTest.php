<?php

namespace Tests\Feature\Answers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutAnswersUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Answers_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
