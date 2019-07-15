<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	['name'=>'laptop','icon'=>'9.png','parent_id'=>0],
        	['name'=>'Máy tính bộ','icon'=>'1.png','parent_id'=>0],
        	['name'=>'Phụ kiện máy tính','icon'=>'3.png','parent_id'=>0],
            ['name'=>'Chuột','icon'=>'3.png','parent_id'=>3],
            ['name'=>'Ram','icon'=>'3.png','parent_id'=>3],
            ['name'=>'Desktop','icon'=>'3.png','parent_id'=>3],
            ['name'=>'Bộ nhớ','icon'=>'3.png','parent_id'=>3],
            ['name'=>'CPU','icon'=>'3.png','parent_id'=>3]
        ]);
    }
}
