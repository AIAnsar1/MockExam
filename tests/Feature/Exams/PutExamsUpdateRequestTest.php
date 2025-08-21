<?php

namespace Tests\Feature\Exams;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutExamsUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Exams_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
