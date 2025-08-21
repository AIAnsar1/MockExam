<?php

namespace Tests\Feature\Courses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetCoursesIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Courses_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
