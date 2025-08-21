<?php

namespace Tests\Feature\About;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostAboutStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_About_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
