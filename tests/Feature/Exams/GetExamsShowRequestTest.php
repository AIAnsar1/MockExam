<?php

namespace Tests\Feature\Exams;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetExamsShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Exams_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
