<?php

namespace Tests\Feature\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTagShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Tag_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
