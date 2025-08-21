<?php

namespace Tests\Feature\Exams;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostExamsStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Exams_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
