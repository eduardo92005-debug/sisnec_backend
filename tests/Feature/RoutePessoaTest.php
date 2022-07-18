<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_route_pessoa()
    {
        $response = $this->get('/api/v1/pessoas');

        $response->assertStatus(200);
    }
}
