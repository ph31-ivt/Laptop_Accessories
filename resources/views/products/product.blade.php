@extends('layouts.master')

@section('title')
	<title>Sản Phẩm</title>
@endsection

@section('content')

<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><a href="product.html"></a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-100 pb-100 ptb-sm-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1 sidebar-left">
                <div class="sidebar">
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mtb-20">
                        <h3 class="sidebar-title">Thương Hiệu</h3>
                        <ul class="sidbar-style">
                            @foreach($producer as $th)
                            <li class="form-check">
                                <input class="form-check-input" name="producer" value="{{$th->producer}}" id="producer" type="checkbox">
                                <label class="form-check-label" >{{$th->producer}}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Price Filter Options Start -->
                            <div class="search-filter mb-40">
                                <h3 class="sidebar-title">filter by price</h3>
                                <form action="#" class="sidbar-style">
                                    <input type="hidden" id="price-min" value="{{$products->min('price')}}">
                                    <input type="hidden" id="price-max" value="{{$products->max('price')}}">
                                    <input type="hidden" id="category" value="{{$category_rp}}">
                                    <input type="hidden" id="search" value="{{isset($search)?$search:''}}">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div id="slider-range"></div>
                                    <input type="text" id="amount" name="price" class="amount-range" readonly>
                                </form>
                            </div>
                            <!-- Price Filter Options End -->
                    <!-- Product Top Start -->
                    <div class="top-new mb-40">
                        <h3 class="sidebar-title">Top New</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            <div class="side-pro-item">
                                @foreach($top_products as $top)
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{route('product-detail',$top->id)}}">
                                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$top->id)->first()->name)}}" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content col-md-8">
                                        <h4><a href="{{route('product-detail',$top->id)}}" title="{{$top->name}}" >{{$top->name}}</a></h4>
                                        <p><span class="price">{{number_format ( $top->price ,0 , "." ,"." )}}đ</span></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->    
                                @endforeach                                
                            </div>
                            <!-- Side Item End -->
                        </div>
                    </div>
                    <!-- Product Top End -->                            
                    <!-- Single Banner Start -->
                    <div class="col-img">
                        <a href="shop.html"><img src="img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    <div class="grid-list-view  mb-sm-15">
                        <ul class="nav tabs-area d-flex align-items-center">
                            <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Sắp xếp theo:</label>
                            <select class="sorter wide">
                                <option value="Price">Giá từ thấp đên cao</option>
                                <option value="Price" selected>Giá từ cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row result-fill">
                                @foreach($products as $pd)
                                    <!-- Single Product Start -->
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{route('product-detail',$pd->id)}}">
                                                    <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$pd->id)->first()->name)}}" alt="single-product">
                                                </a>
                                                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                                <input type="hidden" value="{{$pd->id}}">
                                                {!!$pd->status==2?'<span class="sticker-new">new</span>':''!!}
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a href="{{route('product-detail',$pd->id)}}">{{$pd->name}}</a></h4>
                                                    <p><span class="price">{{number_format ( $pd->price ,0 , "." ,"." )}}đ</p>
                                                </div>
                                                @if(count($pd->promotion))
                                                    <div class="promotion mt-20">
                                                        <dl>
                                                            <dt class="mb-1 text-success">Khuyến mãi:</dt>
                                                            @foreach($pd->promotion as $km)
                                                                <dd class="mb-1"><span class="lnr lnr-tag">{{$km->content}}</span></dd>
                                                            @endforeach
                                                        </dl>
                                                    </div>
                                                @endif
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="{{route('add.cart.get',$pd->id)}}" title="Add to Cart">Thêm vào giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="{{route('add.wishlist.get',$pd->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- #grid view End -->
                        <div class="pro-pagination">
                            <!-- {{$products}} -->
                        </div>
                        <!-- Product Pagination Info -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@endsection