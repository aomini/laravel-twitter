<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{    
    use DatabaseMigrations;

    /** @test */
    public function a_non_authenticated_user_is_redirected_to_home_page(){
        $response = $this->get('home');
        $response->assertRedirect('login');
    }
    
}
