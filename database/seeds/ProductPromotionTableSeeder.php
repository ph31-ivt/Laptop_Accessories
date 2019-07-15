<?php

use Illuminate\Database\Seeder;

class ProductPromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_promotion')->insert([
        	['product_id'=>1,'promotion_id'=>1],
        	['product_id'=>1,'promotion_id'=>2],
        	['product_id'=>1,'promotion_id'=>3],
        	['product_id'=>2,'promotion_id'=>1],
        	['product_id'=>2,'promotion_id'=>2],
        	['product_id'=>2,'promotion_id'=>3],
        	['product_id'=>3,'promotion_id'=>1],
        	['product_id'=>3,'promotion_id'=>3],
        	['product_id'=>3,'promotion_id'=>4],
        	['product_id'=>4,'promotion_id'=>4]
        ]);
    }
}
