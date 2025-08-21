<?php

namespace Tests\Feature\About;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutAboutUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_About_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
