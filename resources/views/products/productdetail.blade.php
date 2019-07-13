@extends('layouts.master')

@section('title')
	<title>Chi tiết sản phẩm</title>
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="{{route('product.get',1)}}">Laptop</a></li>
                <li class="active"><a href="product.html">Sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-30 ptb-sm-60">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        <?php $count=0; ?>
                        @foreach($images->where('product_id',$products->id) as $ig)
                            <div id="thumb{{$count}}" class="tab-pane fade {{$count==0?'show active':''}}">
                                <a data-fancybox="images" href="{{asset('img/products/'.$ig->name)}}"><img src="{{asset('img/products/'.$ig->name)}}" alt="product-view"></a>
                            </div>
                            <?php $count++; ?>
                        @endforeach
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail mt-15">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                            <?php $count=0; ?>
                            @foreach($images->where('product_id',$products->id) as $ig)
                                <a class="{{$count==0?'active':''}}" data-toggle="tab" href="#thumb{{$count}}"><img src="{{asset('img/products/'.$ig->name)}}" alt="product-thumbnail">
                                <?php $count++; ?></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{$products->name}}</h3>
                        <div class="rating-summary fix mtb-10">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="pro-price mtb-20">
                            <p class="d-flex align-items-center"><span>Giá: </span><span class="price">{{number_format ( $products->price ,0 , "." ,"." )}}đ</span></p>
                        </div>
                        <div class="promotion-product mtb-10">
                            <div class="head-promotion">
                                <p>KHUYẾN MÃI</p>
                            </div>
                            <div class="body-promotion">
                                <ul class="promotion-detail" >
                                    @foreach($products->promotion as $km)
                                        <li><span class="in-stock"><i class="lnr lnr-tag"></i>{{$km->content}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <p class="mb-10 pro-desc-details">{{$products->description}}</p>
                        <div class="box-quantity d-flex hot-product2">
                            <form action="{{url('shopping/addCart',$products->id)}}" method="POST" id="addcart">
                                @csrf
                                <input class="quantity mr-15" type="number" min="1" value="1" max="$products->id" name="qty">
                            </form>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <button type="submit" class="btn btn-danger btn-lg" form="addcart">Thêm vào giỏ hàng</button>
                                </div>
                                <div class="actions-secondary ml-10">
                                    <a href="{{route('add.wishlist.get',$products->id)}}" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Thêm vào danh sách yêu thích</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="pro-ref mt-20">
                            <p><span class="in-stock"><i class="ion-{{$products->quantity<0?'close':'checkmark'}}-round" style="{{$products->quantity<0?'color: red;':''}}"></i> {{$products->quantity<0?'Hết hàng':'Có trong kho'}} </span><span class="badge badge-{{$products->quantity<0?'danger':'success'}}">{{$products->quantity}}</span></p>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-50 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#dtail">Product Details</a></li>
                    <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="group-title">
                                    <h2>Thông số kỹ thuật</h2>
                                </div>
                                <table class="table digital">
                                    <tbody>
                                        @foreach($productdetail as $pd)
                                            <tr>
                                                <th style="width: 150px;"><p><strong>{{$pd->feature}}</strong></p></th>
                                                <td><p>{{$pd->describe}}</p></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding">
                            <div class="group-title">
                                <h2>ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2>
                            </div>
                            <div class="col-md-4">
                                <ul class="ul-rating">
                                  <li class="d-inline-flex li-rating">
                                    <span class="blue">5 sao</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:70%">70%</div>
                                    </div>
                                    <span class="count-rating5">0</span>
                                  </li>
                                  <li class="d-inline-flex">
                                    <span class="blue">4 sao</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:70%">70%</div>
                                    </div>
                                    <span class="count-rating4">0</span>
                                  </li>
                                  <li class="d-inline-flex">
                                    <span class="blue">3 sao</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:70%">70%</div>
                                    </div>
                                    <span class="count-rating3">0</span>
                                  </li>
                                  <li class="d-inline-flex">
                                    <span class="blue">2 sao</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:70%">70%</div>
                                    </div>
                                    <span class="count-rating2">0</span>
                                  </li>
                                  <li class="d-inline-flex">
                                    <span class="blue">1 sao</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:70%">70%</div>
                                    </div>
                                    <span class="count-rating1">0</span>
                                  </li>
                                </ul>
                              </div>
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">ĐÁNH GIÁ CỦA BẠN</h2>
                            <span>Mức đánh giá</span>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form autocomplete="off" action="{{route('comment.product.put',$products->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="rating" value="5">
                                    <input type="hidden" name="login" value="{{\Auth::check()?'1':''}}">
                                    <div class="form-group">
                                        <label class="req" for="subject">Tiêu đề</label>
                                        <input type="text" name="title" class="form-control" id="subject" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Nhận xét của bạn</label>
                                        <textarea class="form-control" name="content" rows="5" id="comments" required="required" placeholder="Nhập nhận xét của bạn về sản phẩm trên"></textarea>
                                    </div>
                                    <button type="submit" class="customer-btn" data-toggle="tooltip" data-placement="left" title="Cần đăng nhập trước khi gửi nhận xét" id="send-comment" >Gửi Nhận Xét</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Products Start Here -->
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
       <!-- Product Title Start -->
       <div class="post-title pb-30">
           <h2>Sản Phẩm tương tự</h2>
       </div>
       <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
            @foreach($Related_Products as $rp)
                <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{route('product-detail',$rp->id)}}">
                            <img class="primary-img" src="{{asset('img/products/'.$images->where('product_id',$rp->id)->first()->name)}}" alt="single-product">
                        </a>
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View" ><i class="lnr lnr-magnifier"></i></a>
                        <input type="hidden" value="{{$rp->id}}">
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="{{route('product-detail',$rp->id)}}">{{$rp->name}}</a></h4>
                            <p><span class="price">{{number_format ( $rp->price ,0 , "." ,"." )}}đ</span></p>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="{{route('add.cart.get',$rp->id)}}" title="Add to Cart">Thêm vào giỏ hàng</a>
                            </div>
                            <div class="actions-secondary">
                                <a href="{{route('add.wishlist.get',$rp->id)}}" title="WishList"><i class="lnr lnr-heart"></i> <span>Yêu thích</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    {!!$rp->status==2?'<span class="sticker-new">new</span>':''!!}
                </div>
                <!-- Single Product End -->    
            @endforeach                    
        </div>                
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->
@endsection
