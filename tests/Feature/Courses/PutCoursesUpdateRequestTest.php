<?php

namespace Tests\Feature\Courses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutCoursesUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Courses_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
