<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'phone' => $faker->phonenumber,
        'address' => $faker->address,
        'gender' => rand(0,1),
        'user_id'=>rand(0,5),
        'role'=>rand(0,1)
    ];
});
