<?php

use Illuminate\Database\Seeder;

class ProductDetaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
        	['properties'=>[{"key":"Ram","value":"1G"},{"key":"display","value":"7in"},{"key":"CPU","value":"intel"}], 'product_id'=>1],
        	['properties'=>[{"key":"Ram","value":"1G"},{"key":"display","value":"7in"},{"key":"CPU","value":"intel"}], 'product_id'=>2],
        	['properties'=>[{"key":"Ram","value":"1G"},{"key":"display","value":"7in"},{"key":"CPU","value":"intel"}], 'product_id'=>3],
        	['properties'=>[{"key":"Ram","value":"1G"},{"key":"display","value":"7in"},{"key":"CPU","value":"intel"}], 'product_id'=>4],
        	['properties'=>[{"key":"Ram","value":"1G"},{"key":"display","value":"7in"},{"key":"CPU","value":"intel"}], 'product_id'=>5]
        ]);
    }
}
