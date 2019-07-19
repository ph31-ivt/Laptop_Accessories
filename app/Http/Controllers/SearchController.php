<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Category;
use App\ProductDetail;

class SearchController extends Controller
{
     public function searchAjax(Request $request)
    {
    	if ($request->option == 0) {
    		$category = Category::pluck('id');
    		$searchs = Product::whereIn('category_id',$category)->where('name','Like','%'.$request->key.'%')->get();
    	}else{
            $categories = Category::where('parent_id',$request->option)->pluck('id');
            if (count($categories)) {
                $searchs = Product::whereIn('category_id',$categories)->where('name','Like' ,'%'.$request->key.'%')->get();
            }else{
                $searchs = Product::where('category_id',$request->option)->where('name','Like' ,'%'.$request->key.'%')->get();
            }
    	}
        $images = Image::all();
    	foreach($searchs as $se)
    	{
		   ?><li class="item-search">
                <a class="p-img" href="<?php echo route('product-detail',$se->id) ?> "><img src="<?php echo asset($se->main_image)  ?>" alt=""></a>
                <a class="p-name" href="<?php echo route('product-detail',$se->id) ?>"><?php echo $se->name ?></a>
            </li>
            <?php
    	}

    }

    public function search(Request $request)
    {
    	if ($request->category == '0') {
    		$category = Category::pluck('id');
            $price = Product::whereIn('category_id',$category)->where('name','Like','%'.$request->search.'%')->get();
    		$products = Product::whereIn('category_id',$category)->where('name','Like','%'.$request->search.'%')->paginate(12);
            $top_products = Product::whereIn('category_id',$category)->where('status',1)->take(4)->get();
            $producer = Product::select('producer')->whereIn('category_id',$category)->where('name','Like','%'.$request->search.'%')->groupBy('producer')->get();
            $category_list = Category::all();
    	}else{
            $categories = Category::where('parent_id',(int)$request->category)->pluck('id');
            if (count($categories)) {
                $price = Product::whereIn('category_id',$categories)->where('name','Like','%'.$request->search.'%')->get();
                $products = Product::whereIn('category_id',$categories)->where('name','Like','%'.$request->search.'%')->paginate(12);
                $top_products = Product::whereIn('category_id',$categories)->where('status',1)->take(4)->get();
                $producer = Product::select('producer')->whereIn('category_id',$categories)->where('name','Like','%'.$request->search.'%')->groupBy('producer')->get();
                $category_list = Category::find($categories);

            }else{
                $price = Product::where('category_id',(int)$request->category)->where('name','Like','%'.$request->search.'%')->get();
        		$products = Product::where('category_id',(int)$request->category)->where('name','Like','%'.$request->search.'%')->paginate(12);
                $top_products = Product::where('category_id',(int)$request->category)->where('status',1)->take(4)->get();
                $producer = Product::select('producer')->where('category_id',(int)$request->category)->where('name','Like','%'.$request->search.'%')->groupBy('producer')->get();  
                $category_list = Category::find((int)$request->category)->toArray();                
            }
    	}
        $price_max = $price->max('price');
        $price_min = $price->min('price');
        $category_rp = $request->category;
        $search = $request->search;
        $images = Image::all();
    	return view('products.product',compact('products','top_products','images','producer','category_rp','search','category_list','price_max','price_min'));
    }

    public function fill(Request $request)
    {
       
        if ($request->category == '0') {
            $category = Category::pluck('id');
            if ($request->producer) {
                $producer = explode(' ', $request->producer);
                if ($request->search) {
                    $products = Product::whereIn('category_id',$category)->whereIn('producer',$producer)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->get();
                }else {
                    $products = Product::whereIn('category_id',$category)->whereIn('producer',$producer)->whereBetween('price', [$request->min, $request->max])->get();
                }
            }
            else{
                if ($request->search) {
                    $products = Product::whereIn('category_id',$category)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->get();
                }else {
                    $products = Product::whereIn('category_id',$category)->whereBetween('price', [$request->min, $request->max])->get();
                }
            }
        }else{
            $categories = Category::where('parent_id',$request->category)->pluck('id');
            if ($request->producer) {
                $producer = explode(' ', $request->producer);
                if ($request->search) {
                    if (count($categories)) {
                        $products = Product::whereIn('category_id',$categories)->whereIn('producer',$producer)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }else{
                        $products = Product::where('category_id',$request->category)->whereIn('producer',$producer)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }
                }else {
                    if (count($categories)) {
                        $products = Product::whereIn('category_id',$categories)->whereIn('producer',$producer)->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }else {
                        $products = Product::where('category_id',$request->category)->whereIn('producer',$producer)->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }
                }
            }else{
                if ($request->search) {
                    if (count($categories)) {
                        $products = Product::whereIn('category_id',$categories)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }else{
                        $products = Product::where('category_id',$request->category)->where('name','Like','%'.$request->search.'%')->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }
                }else {
                    if (count($categories)) {
                        $products = Product::whereIn('category_id',$categories)->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get();
                    }else{
                        $products = Product::where('category_id',$request->category)->whereBetween('price', [$request->min, $request->max])->orderBy('price',$request->orderby)->get(); 
                    }
                }
            }
        }

        foreach($products as $pd){
        ?> 
        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="<?php echo url('product-detail',$pd->id)?>">
                        <img class="primary-img" src="<?php echo url($pd->main_image); ?>" alt="single-product">
                    </a>
                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                    <?php echo $pd->status==2?'<span class="sticker-new">new</span>':'';?>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="<?php echo url('product-detail',$pd->id)?>"><?php echo $pd->name ?></a></h4>
                        <p><span class="price"><?php echo number_format( $pd->price ,0 , "." ,"." )?>d</p>
                    </div>
                    <?php if(count($pd->promotions)){ ?>
                        <div class="promotion mt-20">
                            <dl>
                                <dt class="mb-1 text-success">Khuyến mãi:</dt>
                                <?php foreach($pd->promotions as $km){ ?>
                                    <dd class="mb-1"><span class="lnr lnr-tag"><?php echo $km->content ?></span></dd>
                                <?php } ?>
                                
                            </dl>
                        </div>
                    <?php }?>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="<?php echo url('shopping/addCart',$pd->id)?>" title="Add to Cart">Thêm vào giỏ hàng</a>
                        </div>
                        <div class="actions-secondary">
                            <a href="<?php echo url('add.wishlist.get',$pd->id)?>" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
        </div>
        <?php
        }

        ?>
        <div class="pro-pagination">
            
        </div>
        <?php
    }

    public function searchProducer($category_id,$producer)
    {
        $price = Product::where('category_id',$category_id)->where('producer',$producer)->get();
        $products = Product::where('category_id',$category_id)->where('producer',$producer)->paginate(12);
        $top_products = Product::where('category_id',$category_id)->where('producer',$producer)->where('status',1)->take(4)->get();
        $producer = Product::select('producer')->where('category_id',$category_id)->where('producer',$producer)->groupBy('producer')->get();
        $category_rp = $category_id;
        $search = '';
        $images = Image::all();
        $category_list = Category::find($category_id)->toArray();
        $price_max = $price->max('price');
        $price_min = $price->min('price');
        return view('products.product',compact('products','top_products','images','producer','category_rp','search','category_list','price_max','price_min'));
    }

    public function searchProperty($category_id,$property)
    {
        $products = Product::where('category_id',$category_id)->get();
        $product_id = $products->pluck('id');
        $productdetails = ProductDetail::whereIn('product_id',$product_id)->get();
        $ar_product_id = [];
        foreach($productdetails as $key=>$detail)
        {
            if ($detail->properties[0]['key'] == $property ) {
                $ar_product_id[] = $detail->product_id;
            }
        }
        $price = Product::where('category_id',$category_id)->whereIn('id',$ar_product_id)->get();
        $products = Product::where('category_id',$category_id)->whereIn('id',$ar_product_id)->paginate(12);
        $top_products = $products->where('status',1);
        $producer = Product::select('producer')->whereIn('id',$ar_product_id)->groupBy('producer')->get();

        $category_rp = $category_id;
        $search = '';
        $images = Image::all();
        $category_list = Category::find($category_id)->toArray();
        $price_max = $price->max('price');
        $price_min = $price->min('price');
        return view('products.product',compact('products','top_products','images','producer','category_rp','search','category_list','price_max','price_min'));

    }
}
