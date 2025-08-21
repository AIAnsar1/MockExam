<?php

namespace Tests\Feature\Answers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostAnswersStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Answers_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
