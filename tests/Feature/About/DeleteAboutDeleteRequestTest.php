<?php

namespace Tests\Feature\About;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteAboutDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_About_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
