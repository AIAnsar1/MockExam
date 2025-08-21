<?php

namespace Tests\Feature\StudentProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostStudentProfileStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_StudentProfile_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
