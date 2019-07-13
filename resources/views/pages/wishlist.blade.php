@extends('layouts.master')

@section('title')
	<title>Wish List</title>
@endsection

@section('content')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active"><a href="{{route('wishlist')}}">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Wish List Start -->
        <div class="cart-main-area wish-list ptb-60 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Table Content Start -->
                        <div class="table-content table-hover table-responsive">
                        	<h2 class="text-center mb-15 text-capitalize">Dánh sách sản phẩm yêu thích của bạn</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-remove"><strong>Xóa</strong></th>
                                        <th class="product-thumbnail"><strong>Hình ảnh</strong></th>
                                        <th class="product-name"><strong>Sản phẩm</strong></th>
                                        <th class="product-description"><strong>Thông tin sản phẩm</strong></th>
                                        <th class="product-price"><strong>Giá</strong></th>
                                        <th class="product-quantity"><strong>Tình trạng tồn kho</strong></th>
                                        <th class="product-subtotal"><strong>Thêm vào giỏ hàng</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($wishlist as $list)
                                    <tr>
                                        <td class="product-remove"> <a href="{{route('wishlist.remove',$list->rowId)}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{asset('img/products/'.$list->options->image)}}" alt="cart-image" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$list->name}}</a></td>
                                        <td class="product-description"><span>{{$list->options->description}}</span></td>
                                        <td class="product-price"><span class="amount text-danger">{{number_format ($list->price ,0 , "," ,"." )}} đ</span></td>
                                        <td class="product-stock-status"><span class="{{$list->qty>0?'':'text-danger'}}">{{$list->qty>0?"Còn hàng:($list->qty)":'Hết hàng'}}</span></td>
                                        <td class="product-add-to-cart"><a href="{{route('add.cart.get',$list->id)}}">Thêm vào giỏ hàng</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Wish List End -->
@endsection