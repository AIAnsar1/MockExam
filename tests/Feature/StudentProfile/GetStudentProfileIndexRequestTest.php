<?php

namespace Tests\Feature\StudentProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetStudentProfileIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_StudentProfile_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
