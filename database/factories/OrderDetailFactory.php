<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'quantity'=>rand(1,10),
        'price'=>rand(1000000,5000000),
        'order_id'=>rand(1,5),
        'product_id'=>rand(1,5)

    ];
});
