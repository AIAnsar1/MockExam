<?php

namespace Tests\Feature\Courses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCoursesDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Courses_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
