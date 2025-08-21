<?php

namespace Tests\Feature\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTagStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Tag_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
