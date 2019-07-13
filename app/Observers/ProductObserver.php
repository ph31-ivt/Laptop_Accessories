<?php

namespace App\Observers;

use App\Product;
use App\ProductDetail;
use App\Image;
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
        $old_img_path=$product->main_image;
        //dd($old_img_path);
        if(File::exists($old_img_path)){
            //dd(true);
            File::delete($old_img_path);
        }
        //dd(false);
        foreach ($productdetails as $productdetail) {
            $productdetail->delete();
            $productdetail->forceDelete();
        }
        $images=Image::where('product_id',$product->id)->get();
        foreach ($images as $image){
            $image_path=$image->path;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $image->delete();//softdelete images
            $image->forceDelete();//remove images
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
