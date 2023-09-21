<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_contain_princess()
    {
         $princesses = ['Linda', 'Lisa', 'Celindar'];

         $this->assertCount(3, $princesses);
         $this->assertContains('Linda', $princesses);
         $this->assertEmpty($princesses);
    }
}
