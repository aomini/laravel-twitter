<?php

namespace App\Http\Controllers\Api\Timeline;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetsCollection;
use App\Tweet;

class TimelineController extends Controller
{
    public function index(){
        $user = User::find(1);
        $tweets = $user->tweetsFromFollowing;
        return new TweetsCollection($tweets);
    }
}
