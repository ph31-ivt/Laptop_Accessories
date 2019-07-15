<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
        	['name'=>'Chuột không dây','category_id'=>4],
        	['name'=>'Chuột có dây','category_id'=>4],
        	['name'=>'Bộ nhớ ngoài','category_id'=>7],
        	['name'=>'Bộ nhớ trong','category_id'=>7],
        	['name'=>'HDD','category_id'=>7],
        	['name'=>'SDD','category_id'=>7],
        	['name'=>'17in','category_id'=>6],
        	['name'=>'21in','category_id'=>6],
        	['name'=>'34in','category_id'=>6],
        	['name'=>'Core i3','category_id'=>8],
        	['name'=>'Core i5','category_id'=>8],
        	['name'=>'Core i7','category_id'=>8]
        ]);
    }
}
