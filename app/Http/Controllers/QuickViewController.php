<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;

class QuickViewController extends Controller
{
    public function quickView($id)
    {
    	$products = Product::find($id);
        $productdetail = $products->productdetail;
        $images = Image::where('product_id',$id)->get();
        ?>
        <!-- Main Thumbnail Image Start -->
            <div class="col-lg-5 mb-all-40">
                <!-- Thumbnail Large Image start -->
                <div class="tab-content">
                    <div id="thumb-0" class="tab-pane fade show active">
                        <a data-fancybox="images" href="<?php echo asset($products->main_image)?>"><img src="<?php echo asset($products->main_image)?>" alt="product-view"></a>
                    </div>
                    <?php $count=1; ?>
                    <?php foreach($images as $ig){?>
                        <div id="thumb-<?php echo $count?>" class="tab-pane fade">
                            <a data-fancybox="images" href="<?php echo asset($ig->path)?>"><img src="<?php echo asset($ig->path)?>" alt="product-view"></a>
                        </div>
                        <?php  $count++; ?>
                    <?php }?>
                </div>
                <!-- Thumbnail Large Image End -->
            </div>
            <!-- Main Thumbnail Image End -->
            <!-- Thumbnail Description Start -->
            <div class="col-lg-7">
                <div class="thubnail-desc fix">
                    <h3 class="product-header"><?php echo $products->name?></h3>
                    <div class="rating-summary fix mtb-10">
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div class="pro-price mtb-20">
                        <p class="d-flex align-items-center"><span>Giá: </span><span class="price"><?php echo number_format ( $products->price ,0 , "." ,"." )?>đ</span></p>
                    </div>
                    <div class="promotion-product mtb-10">
                        <div class="head-promotion">
                            <p>KHUYẾN MÃI</p>
                        </div>
                        <div class="body-promotion">
                            <ul class="promotion-detail" >
                                <?php foreach($products->promotions as $km) {?>
                                    <li><span class="in-stock"><i class="lnr lnr-tag"></i><?php echo $km->content?></span></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <p class="mb-10 pro-desc-details"><?php echo $products->description?></p>
                    <div class="box-quantity d-flex hot-product2">
                        <form action="<?php echo url('shopping/addCart',$products->id)?>"
                         method="POST" id="addcart-1">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input class="quantity mr-15" type="number" min="1" value="1" max="<?php echo $products->quantity ?>" name="qty">
                        </form>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <button type="submit" class="btn btn-danger btn-lg" form="addcart-1">Thêm vào giỏ hàng</button>
                            </div>
                            <div class="actions-secondary ml-10">
                                <a href="<?php echo url('add.wishlist.get',$products->id)?>" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Thêm vào danh sách yêu thích</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="pro-ref mt-20">
                        <p><span class="in-stock"><i class="ion-<?php echo $products->quantity<0?'close':'checkmark'?>-round" style="<?php echo $products->quantity<0?'color: red;':''?>"></i> <?php echo $products->quantity<0?'Hết hàng':'Có trong kho'?> </span><span class="badge badge-<?php echo $products->quantity<0?'danger':'success'?>"><?php echo $products->quantity?></span></p>
                    </div>
                </div>
            </div>
            <!-- Thumbnail Description End -->
        <?php 
    }
}
