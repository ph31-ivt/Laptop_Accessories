<?php

namespace App\Observers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\File;
class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
       
    }
    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function creating(Category $category){
        
    }
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        
    }
    public function deleting(Category $category){
        
        $products=Product::where('category_id',$category->id)->get();  
        foreach ($products as $product) {
            $old_img_path=$product->main_image;
            if(File::exists($old_img_path)){
                File::delete($old_img_path);
            }
            $product->delete();
        }
    }
    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
