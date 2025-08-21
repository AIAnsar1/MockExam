<?php

namespace Tests\Feature\Statistics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostStatisticsStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Statistics_Post_request(): void
    {
        $response = $this->Post('/');

        $response->assertStatus(200);
    }
}
