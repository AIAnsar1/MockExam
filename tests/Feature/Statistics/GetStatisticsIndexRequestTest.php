<?php

namespace Tests\Feature\Statistics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetStatisticsIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Statistics_Get_request(): void
    {
        $response = $this->Get('/');

        $response->assertStatus(200);
    }
}
