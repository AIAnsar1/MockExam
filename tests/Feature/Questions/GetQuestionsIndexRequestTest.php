<?php

namespace Tests\Feature\Questions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetQuestionsIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Questions_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
