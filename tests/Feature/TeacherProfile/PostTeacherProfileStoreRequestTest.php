<?php

namespace Tests\Feature\TeacherProfile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTeacherProfileStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_TeacherProfile_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
