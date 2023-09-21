<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_login_page_returns_a_successful_response(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register_page_returns_a_successful_response(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_category_page_returns_a_successful_response(): void
    {
        $response = $this->get('/category/other');
        $response->assertStatus(200);
    }

    public function test_list_tag_page_returns_a_successful_response(): void
    {
        $response = $this->get('/tags');
        $response->assertStatus(200);
    }

    public function test_new_game_returns_a_successful_response(): void
    {
        $response = $this->get('/new-games');
        $response->assertStatus(200);
    }

    public function test_best_games_page_returns_a_successful_response(): void
    {
        $response = $this->get('/best-games');
        $response->assertStatus(200);
    }

    public function test_search_page_returns_a_successful_response(): void
    {
        $response = $this->get('/search');
        $response->assertStatus(200);
    }

    public function test_reset_password_successful_page_returns_a_successful_response(): void
    {
        $response = $this->get('/reset-password-success');
        $response->assertStatus(200);
    }

    public function test_reset_password_page_returns_a_successful_response(): void
    {
        $response = $this->get('/reset-password');
        $response->assertStatus(200);
    }

    public function test_forgot_password_page_returns_a_successful_response(): void
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }
}
