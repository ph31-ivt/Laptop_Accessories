<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
    	'code'=>'#'.rand(0,100),
    	'fullname'=>$faker->name,
        'phone'=>$faker->phonenumber,
        'address'=>$faker->address,
        'total_price'=>rand(1000000,100000000),
        'status'=>rand(0,3),
        'user_id'=>mt_rand(1,5)
    ];
});
