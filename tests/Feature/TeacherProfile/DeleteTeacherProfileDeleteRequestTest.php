<?php

namespace Tests\Feature\TeacherProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTeacherProfileDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_TeacherProfile_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
