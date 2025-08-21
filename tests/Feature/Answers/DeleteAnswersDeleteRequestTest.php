<?php

namespace Tests\Feature\Answers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteAnswersDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Answers_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
