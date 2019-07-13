<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title'=>$faker->name,
        'rating'=>rand(1,5),
        'content'=>$faker->text,
        'status'=>rand(0,2),
        'product_id'=>rand(1,5),
        'user_id'=>rand(1,5)
    ];
});
