<?php

namespace Tests\Feature\Statistics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteStatisticsDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Statistics_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
