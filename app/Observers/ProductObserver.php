<?php

namespace App\Observers;

use App\Product;
use App\ProductDetail;
use Illuminate\Support\Facades\File;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }
    // event deleting product====
    public function deleting(Product $product){
        $productdetails=ProductDetail::where('product_id',$product->id)->get();  
        foreach ($productdetails as $productdetail) {
            $old_img_path=$product->main_image;
            if(File::exists($old_img_path)){
                File::delete($old_img_path);
            }
            $productdetail->delete();
        }
    }
    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
