<?php

namespace Tests\Feature\Answers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAnswersShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Answers_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
