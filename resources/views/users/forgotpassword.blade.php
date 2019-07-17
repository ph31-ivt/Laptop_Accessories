@extends('layouts.master')

@section('title')
	<title>Quên mật khẩu</title>
@endsection

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="{{route('user.login.get')}}">Đăng nhập</a></li>
                    <li class="active"><a href="{{route('forgotPassword.get')}}">Quên mật khẩu</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="Lost-pass ptb-100 ptb-sm-60">
        <div class="container">
            <form class="password-forgot clearfix" action="mail.php">
                <fieldset>
                    <legend>Đặt lại mật khẩu</legend>
                    <div class="form-group d-md-flex">
                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Email:</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons newsletter-input">
                    <div class="float-left float-sm-left">
                        <a class="customer-btn mr-20" href="{{route('user.login.get')}}">Quay lại</a>
                    </div>
                    <div class="float-right float-sm-right">
                        <input type="submit" value="Tiếp tục" class="return-customer-btn">
                    </div>
                </div>
            </form>
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->
@endsection