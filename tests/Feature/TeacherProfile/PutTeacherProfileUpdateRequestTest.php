<?php

namespace Tests\Feature\TeacherProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutTeacherProfileUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_TeacherProfile_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
