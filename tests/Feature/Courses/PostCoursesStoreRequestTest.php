<?php

namespace Tests\Feature\Courses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCoursesStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Courses_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
