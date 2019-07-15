<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(ProductPromotionTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(ProductDetailTableSeeder::class);

    }
}
