@extends('layouts.master')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')
    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
        <div class="container">
           <!-- Product Title Start -->
           <div class="post-title pb-30">
               <h2>Sản phẩm hot</h2>
           </div>
           <!-- Product Title End -->
            <!-- Hot Deal Product Activation Start -->
            <div class="hot-deal-active owl-carousel">
                @foreach($products->where('status',1) as $hp)
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{route('product-detail',$hp->id)}}">
                                <img class="primary-img" src="{{asset($hp->main_image)}}" alt="single-product">
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                            <input type="hidden" value="{{$hp->id}}">
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="product.html">{{$hp->name}}</a></h4>
                                <p><span class="price">{{number_format ( $hp->price ,0 , "." ,"." )}}đ</span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="{{route('add.cart.get',$hp->id)}}" title="Add to Cart" class="text-capitalize">Thêm vào giỏ hàng</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="{{route('add.wishlist.get',$hp->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                @endforeach
            </div>
            <!-- Hot Deal Product Active End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Hot Deal Products End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Sản phẩm Mới</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <?php $category_count_0 = 0; ?>
                        @foreach($categories->where('parent_id',0) as $ca)
                            <li class="nav-item">
                                <a class="nav-link {{$category_count_0==0?'active':''}}" data-toggle="tab" href="#{{strtr($ca->name,' ','-')}}_1">{{$ca->name}}</a>
                            </li>
                            <?php $category_count_0++; ?>
                        @endforeach
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <?php $category_count_1 = 0; ?>
                    @foreach($categories->where('parent_id',0) as $ca)
                        <div id="{{strtr($ca->name,' ','-')}}_1" class="tab-pane fade {{$category_count_1==0?'show active':''}}">
                            <!-- Arrivals Product Activation Start Here -->
                            <?php 
                                $categories_p = $categories->where('parent_id',$ca->id)->pluck('id');
                                if (count($categories_p)) {
                                    $products_n = $products->whereIn('category_id',$categories_p)->where('status',2);
                                }else{
                                    $products_n = $products->where('category_id',$ca->id)->where('status',2);
                                }

                            ?>
                            <div class="best-seller-pro-active owl-carousel">
                                @foreach($products_n as $pn)
                                     <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$pn->id)}}">
                                                <img class="primary-img" src="{{asset($pn->main_image)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$pn->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$pn->id)}}">{{$pn->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $pn->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$pn->id)}}" title="Add to Cart" class="text-capitalize">Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$pn->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">new</span>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Arrivals Product Activation End Here -->
                        </div>
                        <?php $category_count_1++; ?>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Laptop</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <?php $producer_count_0 = 0; ?>
                        @foreach($products->where('category_id',2)->groupBy('producer') as $key=>$producer)
                            <li class="nav-item">
                                <a class="nav-link {{$producer_count_0==0?'active':''}}" data-toggle="tab" href="#{{$key}}">{{$key}}</a>
                            </li>
                            <?php $producer_count_0++; ?>
                        @endforeach
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <?php $producer_count_1 = 0; ?>
                    @foreach($products->where('category_id',2)->groupBy('producer') as $key=>$producer)
                        <div id="{{$key}}" class="tab-pane fade {{$producer_count_1==0?'show active':''}}">
                            <!-- Arrivals Product Activation Start Here -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($products->where('category_id',2)->where('producer',$key) as $pp)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$pp->id)}}">
                                                <img class="primary-img" src="{{asset($pp->main_image)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$pp->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$pp->id)}}">{{$pp->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $pp->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$pp->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$pp->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Arrivals Product Activation End Here -->
                        </div>
                        <!-- #fshion End Here -->
                        <?php $producer_count_1++; ?>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Máy Tính Bộ</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <?php $producer_count_0 = 0; ?>
                        @foreach($products->where('category_id',3)->groupBy('producer') as $key=>$producer)
                            <li class="nav-item">
                                <a class="nav-link {{$producer_count_0==0?'active':''}}" data-toggle="tab" href="#{{$key}}_1">{{$key}}</a>
                            </li>
                            <?php $producer_count_0++; ?>
                        @endforeach
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <?php $producer_count_1 = 0; ?>
                    @foreach($products->where('category_id',3)->groupBy('producer') as $key=>$producer)
                        <div id="{{$key}}_1" class="tab-pane fade {{$producer_count_1==0?'show active':''}}">
                            <!-- Arrivals Product Activation Start Here -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($products->where('category_id',3)->where('producer',$key) as $pp)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$pp->id)}}">
                                                <img class="primary-img" src="{{asset($pp->main_image)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$pp->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$pp->id)}}">{{$pp->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $pp->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$pp->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$pp->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Arrivals Product Activation End Here -->
                        </div>
                        <!-- #fshion End Here -->
                        <?php $producer_count_1++; ?>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
    <!-- Arrivals Products Area Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-25">
                    <div class="section-ttitle">
                        <h2>Phụ Kiện Máy Tính</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <?php $accessory_count_0 = 0; ?>
                        @foreach($categories->where('parent_id',4) as $ca)
                            <li class="nav-item">
                                <a class="nav-link {{$accessory_count_0==0?'active':''}}" data-toggle="tab" href="#{{strtr($ca->name,' ','-')}}">{{$ca->name}}</a>
                            </li>
                            <?php $accessory_count_0++; ?>
                        @endforeach
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <?php $accessory_count_1 = 0; ?>
                    @foreach($categories->where('parent_id',4) as $ca)
                        <div id="{{strtr($ca->name,' ','-')}}" class="tab-pane fade {{$accessory_count_1==0?'show active':''}}">
                            <!-- Arrivals Product Activation Start Here -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($products->where('category_id',$ca->id)->where('status',3) as $pp)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$pp->id)}}">
                                                <img class="primary-img" src="{{asset($pp->main_image)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$pp->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$pp->id)}}">{{$pp->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $pp->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$pp->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$pp->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Arrivals Product Activation End Here -->
                        </div>
                        <!-- #fshion End Here -->
                        <?php $accessory_count_1++; ?>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
@endsection