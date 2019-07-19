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
use App\Comment;


class ProductController extends Controller
{
    public function productDetail($id)
    {
        $products = Product::with('category')->find($id);
        $comments = $products->comments;
        $number_rating = count($comments);  // so lan danh gia
        $tatol_rating = 0;
        $one_star = 0;
        $two_star = 0;
        $three_star = 0;
        $four_star = 0;
        $five_star = 0;
        foreach ($comments as $value) {
            switch ($value->rating) {
                case 1:
                    $one_star++;
                    break;
                case 2:
                    $two_star++;
                    break;
                case 3:
                    $three_star++;
                    break;
                case 4:
                    $four_star++;
                    break;
                case 5:
                    $five_star++;
                    break;
            }
        }
        $tatol_rating = $one_star + ($two_star*2) + ($three_star*3) + ($four_star*4) + ($five_star*5);
        $images = Image::all();
        $Related_Products = Product::where('category_id',$products->category_id)->get();
        return view('products.productdetail',compact('products','images','Related_Products','one_star','two_star','three_star','four_star','five_star','number_rating','tatol_rating'));
    }

    public function product($category)
    {
        $categories = Category::where('parent_id',$category)->pluck('id');
        if (count($categories)) {
            $price = Product::whereIn('category_id',$categories)->get();
            $products = Product::whereIn('category_id',$categories)->paginate(12);
            $producer = Product::select('producer')->whereIn('category_id',$categories)->groupBy('producer')->get();
            $category_list = Category::find($categories);
        }else{
            $price = Product::where('category_id',$category)->get();
            $products = Product::where('category_id',$category)->paginate(12);
            $producer = Product::select('producer')->where('category_id',$category)->groupBy('producer')->get();
            $category_list = Category::find($category)->toArray();
        }
        $price_max = $price->max('price');
        $price_min = $price->min('price');
        $top_products = Product::where('category_id',$category)->where('status',1)->take(4)->get();
        $category_rp = $category;
        
        return view('products.product',compact('products','top_products','producer','category_rp','category_list','price_max','price_min'));
    }

}
