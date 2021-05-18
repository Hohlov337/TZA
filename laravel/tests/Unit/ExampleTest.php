<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test  */
    public function a_user_can_browse_posts()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }
}
