<?php

namespace Tests\Feature\StudentProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteStudentProfileDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_StudentProfile_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
