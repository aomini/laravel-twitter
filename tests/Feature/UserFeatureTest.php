<?php
namespace Tests\Unit;

use App\Http\Resources\TweetResource;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_get_all_tweets_from_following(){
        $viewer = create('App\User');
        $following = create('App\User');

        $viewer->following()->attach($following->id);
        $tweets = factory('App\Tweet', 2)->create(["user_id" => $following->id]);

        $response = $this->getJson('/api/timeline');
        $json = $response->json();

        $resource = TweetResource::collection($tweets);
        $resourceResponse = $resource->response()->getData(true);
        
        $this->assertEquals($json, $resourceResponse);
    }
}