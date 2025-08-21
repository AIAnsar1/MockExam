<?php

namespace Tests\Feature\StudentProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutStudentProfileUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_StudentProfile_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
