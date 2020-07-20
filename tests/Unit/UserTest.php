<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{      
    use DatabaseMigrations;

    public function setUp(): void{
        parent::setUp();
        $this->user = create('App\User');
    }

    /** @test */
    public function it_has_followers(){
        $followers = factory('App\User', 2)->create();
        $this->user->followers()->attach($followers);
        $this->assertCount(2, $this->user->followers);
        $this->assertInstanceOf('App\User', $this->user->followers[0]);
    }

    /** @test */
    public function it_is_following(){
        $followings = factory('App\User', 4)->create();
        $this->user->following()->attach($followings->pluck('id'));
        $this->assertCount(4, $this->user->following);
    }

    /** @test */
    public function it_has_tweets(){
        $this->assertInstanceOf(Collection::class, $this->user->tweets);
    }

    /** @test */
    public function it_has_following_tweets(){
        $this->assertInstanceOf(Collection::class, $this->user->tweetsFromFollowing);
    }

}
