@extends('layouts.master')

@section('title')
	<title>Checkout</title>
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active"><a href="{{route('checkout')}}">Thanh toán</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- checkout-area start -->
<div class="checkout-area pb-100 pt-15 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox-form mb-sm-40">
                    <h3>Chi tiết thanh toán</h3>
                    <div class="row">
                    	<form action="{{route('checkout.put')}}" class="col-md-12" id="checkout-infor-form" method="POST">
                    		@csrf
                    		@method('PUT')
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list clearfix mb-sm-30">
                                    <label>Họ và tên<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Nhập Họ và tên" value="{{Auth::check()?Auth::user()->fullname:old('fullname')}}" />
                                    @if($errors->has('fullname'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list clearfix mb-sm-30">
                                    <label>Giới tính</label>
                                </div>
                                <div>
	                                <label  class="checkbox-inline" for="nam"><input type="radio" name="gender" value="nam" id="nam" {{Auth::check()?Auth::user()->profile?Auth::user()->profile->gender=='nam'?'checked':'':'':'checked'}} /> Nam</label>
	                            	<label class="checkbox-inline ml-15" for="nu"><input type="radio" name="gender" value="nu" id="nu" {{Auth::check()?Auth::user()->profile?Auth::user()->profile->gender=='nu'?'checked':'':'':''}}  /> Nữ</label>
                            	</div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{Auth::check()?Auth::user()->profile?Auth::user()->profile->address:old('address'):old('address')}}"/>
                                    @if($errors->has('address'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email" value="{{Auth::check()?Auth::user()->email:old('email')}}" {{Auth::check()?'readonly':''}} />
                                    @if($errors->has('email'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list">
                                    <label>Sô điện thoại  <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại của bạn" value="{{Auth::check()?Auth::user()->profile?Auth::user()->profile->phone:old('phone'):old('phone')}}"/>
                                    @if($errors->has('phone'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 fade {{Auth::check()?'hide':'show'}}">
                                <div class="checkout-form-list create-acc mb-15">
                                    <input id="cbox" type="checkbox" name="register"  {{Auth::check()?'disabled':''}} />
                                    <label>Tạo một tài khoản</label>
                                </div>
                                <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                    <p class="mb-10">Tạo một tài khoản theo thông tin nhập ở trên. Nếu bạn đã có tài khoản, thì vui lòng đăng nhập ở đầu trang</p>
                                    <div class="checkout-form-list form-group">
                                        <label>Mật khẩu  <span class="required">*</span></label>
                                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                                        @if($errors->has('password'))
	                                        <div class="col-md-12 alert alert-danger">
	                                            <strong>{{ $errors->first('password') }}</strong>
	                                        </div>
	                                    @endif
                                    </div>
                                    <div class="checkout-form-list form-group">
                                        <label>Nhập lại mật khẩu  <span class="required">*</span></label>
                                        <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" />
                                        @if($errors->has('re_password'))
	                                        <div class="col-md-12 alert alert-danger">
	                                            <strong>{{ $errors->first('re_password') }}</strong>
	                                        </div>
	                                    @endif
                                    </div>
                                </div>
                            </div>
                            @if(Auth::check()&&Auth::user()->profile)
                            <div class="col-md-12">
                                <p >Nếu thông tin tài khoản của bạn không chính xác thì hãy <a href="{{route('user.profile.get',Auth::user()->id)}}">Thay đổi thông tin tài khoản</a></p>
                            </div>
                            @endif
                            <div class="js-message alert alert-danger fade hidden">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Đơn hàng</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name ">Sản Phẩm</th>
                                    <th class="product-number" style="width:150px;">Số lượng</th>
                                    <th class="product-total">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($cart as $ca)
                                <tr class="cart_item">
                                    <td class="product-name text-left">
                                        {{$ca->name}}
                                    </td>
                                    <td class="product-number">
                                        <span class="amount">{{$ca->qty}}</span>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">{{number_format ( ($ca->price*$ca->qty) ,0 , "," ,"." )}} đ</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total ">
                                    <th colspan="2" class="text-left">Tổng thanh toán</th>
                                    <td><span class="total amount text-danger">{{Cart::instance('cart')->subtotal(0,',','.')}} đ</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="submit" form="checkout-infor-form" class="btn btn-danger btn-block mt-30" value="Đặt hàng" {{Auth::check()?'':'disabled'}} >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection