<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
        	['content'=>'Chuột'],
        	['content'=>'Ba lô'],
        	['content'=>'tai nghe'],
        	['content'=>'Bàn phím'],
        	['content'=>'Phiếu xăng trị giá 300.000đ'],
        ]);
    }
}
