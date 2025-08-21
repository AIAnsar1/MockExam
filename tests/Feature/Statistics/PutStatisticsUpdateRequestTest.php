<?php

namespace Tests\Feature\Statistics;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutStatisticsUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Statistics_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
