<?php

namespace Tests\Feature\About;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAboutShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_About_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
