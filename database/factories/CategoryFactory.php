<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
       'name'=>$faker->name,
       'icon'=>$faker->address,
      	'parent_id'=>rand(1,5)
    ];
});
