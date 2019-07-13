@extends('layouts.master')

@section('title')
	<title>Giỏ Hàng</title>
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active"><a href="{{route('cart.get')}}">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Form Start -->
                <form action="{{route('update.cart.post')}}" method="POST">
                	@csrf
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail"><strong>Hình ảnh</strong></th>
                                    <th class="product-name"><strong>Sản phẩm</strong></th>
                                    <th class="product-price"><strong>Giá</strong></th>
                                    <th class="product-quantity"><strong>Số lượng</strong></th>
                                    <th class="product-subtotal"><strong>Tổng giá</strong></th>
                                    <th class="product-remove"><strong>Xóa</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $count = 0; ?>
                            	@foreach($cart as $key=>$ca)
                                <tr>
                                	<input type="hidden" name="{{$count}}[]" value="{{$key}}">
                                    <td class="product-thumbnail">
                                        <a href="{{route('product-detail',$ca->id)}}"><img src="{{asset('img/products/'.$ca->options->image)}}" alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="{{route('product-detail',$ca->id)}}">{{$ca->name}}</a></td>
                                    <td class="product-price"><span class="amount text-danger">{{number_format( $ca->price ,0 , "," ,"." )}} đ</span></td>
                                    <td class="product-quantity"><input type="number" name="{{$count}}[]" value="{{$ca->qty}}" /></td>
                                    <td class="product-subtotal text-danger">{{number_format ( ($ca->price*$ca->qty) ,0 , "," ,"." )}} đ</p></td>
                                    <td class="product-remove"> <a href="{{route('cart.remove',$key)}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    <?php $count++; ?>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                       <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <input type="submit" value="Cập nhật giỏ hàng" />
                                <a href="{{route('home')}}">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng giỏ hàng</h2>
                                <br />
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td>
                                                <strong><span class="amount">{{Cart::instance('cart')->subtotal(0,',','.')}} đ</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('checkout')}}">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
         <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->
@endsection