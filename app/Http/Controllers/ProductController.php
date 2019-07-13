<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductPromotion;
use App\UserProfile;
use App\Promotion;
use App\Image;
use App\ProductDetail;

class ProductController extends Controller
{
    public function productDetail($id)
    {
        $products = Product::find($id);
        $productdetail = $products->productdetail()->get();
        $images = Image::all();
        $Related_Products = Product::where('type_product','like','%'."$products->type_product".'%')->get();
        return view('pages.productdetail',compact('products','images','productdetail','Related_Products'));
    }

    public function product($category)
    {
        $products = Product::where('category_id',$category)->paginate(12);
        $producer = Product::select('producer')->where('category_id',$category)->groupBy('producer')->get();
        $top_products = Product::where('category_id',$category)->where('status',1)->take(4)->get();
        $category_rp = $category;
        $images = Image::all();
        return view('pages.product',compact('products','top_products','images','producer','category_rp'));
    }
}
