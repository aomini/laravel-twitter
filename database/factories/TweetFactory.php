<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        "user_id" => function(){
            return factory('App\User')->create()->id;
        },
        "body" => $faker->text,
        "created_at"=> now(),
        "updated_at"=> now()
    ];
});
