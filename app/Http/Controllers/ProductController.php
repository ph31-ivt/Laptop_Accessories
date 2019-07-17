<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductPromotion;
use App\UserProfile;
use App\Promotion;
use App\Image;
use App\ProductDetail;
use App\Category;

class ProductController extends Controller
{
    public function productDetail($id)
    {
        $products = Product::with('category')->find($id);
        $images = Image::all();
        $Related_Products = Product::where('category_id',$products->category_id)->get();
        return view('products.productdetail',compact('products','images','Related_Products'));
    }

    public function product($category)
    {
        $categories = Category::where('parent_id',$category)->pluck('id');
        if (count($categories)) {
            $products = Product::whereIn('category_id',$categories)->paginate(12);
            $producer = Product::select('producer')->whereIn('category_id',$categories)->groupBy('producer')->get();
        }else{
            $products = Product::where('category_id',$category)->paginate(12);
            $producer = Product::select('producer')->where('category_id',$category)->groupBy('producer')->get();
        }
        $top_products = Product::where('category_id',$category)->where('status',1)->take(4)->get();
        $category_rp = $category;
        return view('products.product',compact('products','top_products','producer','category_rp'));
    }

}
