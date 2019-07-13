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
                @foreach($hot_products as $hp)
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{route('product-detail',$hp->id)}}">
                                <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$hp->id)->first()->name)}}" alt="single-product">
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
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#laptop_1">Laptop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#computer_1">Máy tính bộ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#accessories_laptop_1">Phụ kiện laptop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#accessories_computer_1">Phụ kiện máy tính bộ</a>
                        </li>
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <div id="laptop_1" class="tab-pane fade show active">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            @foreach($new_laptop_products as $lt)
                                 <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$lt->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$lt->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$lt->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$lt->id)}}">{{$lt->name}}</a></h4>
                                            <p><span class="price text-success">{{number_format ( $lt->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$lt->id)}}" title="Add to Cart" class="text-capitalize">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$lt->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <!-- #fshion End Here -->
                    <div id="computer_1" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            @foreach($new_computer_products as $mtb)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$mtb->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$mtb->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$mtb->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$mtb->id)}}">{{$mtb->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $mtb->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$mtb->id)}}" title="Add to Cart">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$mtb->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <!-- #fshion End Here -->
                    <div id="accessories_laptop_1" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            @foreach($new_al_products as $alt)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$alt->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$alt->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$alt->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$alt->id)}}">{{$alt->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $alt->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$alt->id)}}" title="Add to Cart">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$alt->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">new</span>
                                </div>
                            @endforeach
                            <!-- Single Product End -->
                        </div>
                        <!-- Arrivals Product Activation End Here -->
                    </div>
                    <!-- #fshion End Here -->
                    <div id="accessories_computer_1" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            @foreach($new_ac_products as $amtb)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$amtb->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$amtb->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$amtb->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$amtb->id)}}">{{$amtb->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $amtb->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$amtb->id)}}" title="Add to Cart">Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$amtb->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">new</span>
                                </div>
                            @endforeach
                            <!-- Single Product End -->
                        </div>
                        <!-- Arrivals Product Activation End Here -->
                    </div>
                    <!-- #beauty End Here -->
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
                        <h2>Laptop</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#dell">Dell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#acer">Acer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lenovo">Lenovo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#hp">HP</a>
                        </li>
                    </ul>                                    
                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <div id="dell" class="tab-pane fade show active">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($laptop_products->where('producer','DELL') as $laptop)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$laptop->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$laptop->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$laptop->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$laptop->id)}}">{{$laptop->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $laptop->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$laptop->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$laptop->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="acer" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($laptop_products->where('producer','Acer') as $laptop)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$laptop->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$laptop->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$laptop->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$laptop->id)}}">{{$laptop->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $laptop->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$laptop->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$laptop->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="lenovo" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($laptop_products->where('producer','lonovo') as $laptop)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$laptop->id)}}">
                                                <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$laptop->id)->first()->name)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$laptop->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$laptop->id)}}">{{$laptop->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $laptop->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$laptop->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$laptop->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    </div>
                    <!-- #beauty End Here -->
                    <div id="hp" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($laptop_products->where('producer','hp') as $laptop)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$laptop->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$laptop->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$laptop->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$laptop->id)}}">{{$laptop->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $laptop->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$laptop->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$laptop->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <!-- #electronics End Here -->
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
                        <h2>Máy tính Bộ</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#dell-1">Dell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#acer-1">Acer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#lenovo-1">Lenovo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#hp-1">HP</a>
                        </li>
                    </ul>                                    

                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <div id="dell-1" class="tab-pane fade show active">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($computer_products->where('producer','DELL') as $computer)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$computer->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$computer->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$computer->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$computer->id)}}">{{$computer->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $computer->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$computer->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="acer-1" class="tab-pane fade">
                         <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($computer_products->where('producer','acer') as $computer)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$computer->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$computer->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$computer->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$computer->id)}}">{{$computer->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $computer->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$computer->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="lenovo-1" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($computer_products->where('producer','lenovo') as $computer)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$computer->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$computer->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$computer->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$computer->id)}}">{{$computer->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $computer->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$computer->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <!-- #beauty End Here -->
                    <div id="hp-1" class="tab-pane fade ">
                         <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($computer_products->where('producer','hp') as $computer)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$computer->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$computer->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$computer->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$computer->id)}}">{{$computer->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $computer->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$computer->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <!-- #electronics End Here -->
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
                        <h2>Phụ kiện Laptop</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#ram">Ram</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ocung">Ổ cứng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#chuot">Chuột</a>
                        </li>
                    </ul>                                    

                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <div id="ram" class="tab-pane fade show active">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($al_products->where('producer','DELL') as $al)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$al->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$al->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$al->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$al->id)}}">{{$al->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $al->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$al->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="ocung" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($al_products->where('producer','Acer') as $al)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$al->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$al->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$al->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$al->id)}}">{{$al->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $al->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$al->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="chuot" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($al_products->where('producer','lonovo') as $al)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$al->id)}}">
                                                <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$al->id)->first()->name)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$al->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$al->id)}}">{{$al->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $al->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$al->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$computer->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    </div>
                    <!-- #electronics End Here -->
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
                        <h2>Phụ kiện áy tính bộ</h2>
                   </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#desktop">Màn Hình</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#board">BOARD mạch chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cpu">CPU </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cpu">Chuột</a>
                        </li>
                    </ul>                                    

                </div> 
                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    <div id="desktop" class="tab-pane fade show active">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($ac_products->where('producer','DELL') as $ac)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$ac->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$ac->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$ac->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$ac->id)}}">{{$ac->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $ac->price ,0 , "." ,"." )}}đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$ac->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$ac->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="board" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                             @foreach($ac_products->where('producer','Acer') as $ac)
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$ac->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$ac->id)->first()->name)}}" alt="single-product">
                                        </a>
                                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                        <input type="hidden" value="{{$ac->id}}">
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{route('product-detail',$ac->id)}}">{{$laptop->name}}</a></h4>
                                            <p><span class="price">{{number_format ( $laptop->price ,0 , "." ,"." )}} đ</span></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{route('add.cart.get',$ac->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="{{route('add.wishlist.get',$ac->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    <div id="cpu" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($ac_products->where('producer','lonovo') as $ac)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$ac->id)}}">
                                                <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$ac->id)->first()->name)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$ac->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$ac->id)}}">{{$ac->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $ac->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$ac->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$ac->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    </div>
                    <!-- #electronics End Here -->
                    <div id="card" class="tab-pane fade">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="best-seller-pro-active owl-carousel">
                                 @foreach($ac_products->where('producer','lonovo') as $ac)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('product-detail',$ac->id)}}">
                                                <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$ac->id)->first()->name)}}" alt="single-product">
                                            </a>
                                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                            <input type="hidden" value="{{$ac->id}}">
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="{{route('product-detail',$ac->id)}}">{{$ac->name}}</a></h4>
                                                <p><span class="price">{{number_format ( $ac->price ,0 , "." ,"." )}}đ</span></p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="{{route('add.cart.get',$ac->id)}}" title="Add to Cart"> Thêm vào giỏ hàng</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="{{route('add.wishlist.get',$ac->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
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
                    </div>
                    <!-- #electronics End Here -->
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Arrivals Products Area End Here -->
@endsection