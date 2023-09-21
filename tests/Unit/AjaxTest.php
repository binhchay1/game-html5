<?php

namespace Tests\Unit;

use Tests\TestCase;

class AjaxTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_former_slug_ajax(): void
    {
        $url = '/former-slug?slug=replace&type=create';
        $response = $this->call('GET', $url);
        $response->assertStatus(302);
        $this->assertTrue(true);
    }

    public function test_get_chart_user_ajax(): void
    {
        $url = '/get-chart-user?type=month';
        $response = $this->call('GET', $url);
        $response->assertStatus(302);
        $this->assertTrue(true);
    }

    public function test_get_chart_count_play_ajax(): void
    {
        $url = '/get-chart-count-play?type=month';
        $response = $this->call('GET', $url);
        $response->assertStatus(302);
        $this->assertTrue(true);
    }
}