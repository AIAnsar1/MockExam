<?php

namespace Tests\Feature\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutTagUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Tag_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
