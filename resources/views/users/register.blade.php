@extends('layouts.master')

@section('title')
	<title>Đăng ký</title>
@endsection

@section('content')
	<!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="active"><a href="{{route('user.register.get')}}">Đăng ký</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="register-account ptb-50 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="register-title">
                        <h3 class="mb-10">Đăng ký tài khoản</h3>
                    </div>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-register" action="{{route('user.register.post')}}" method="post">
                    	@csrf
                        <fieldset>
                            <legend>Thông tin cá nhân</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Họ và tên</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="f-name" name="fullname" placeholder="Nhập họ và tên" value="{{ old('fullname') }}">
                                </div>
                            </div>
                            @if($errors->has('fullname'))
                                <div class="offset-md-2 col-md-10 alert alert-danger">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </div>
                            @endif
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter you email address here..." value="{{ old('email') }}">
                                </div>
                            </div>
                            @if($errors->has('email'))
                                <div class="offset-md-2 col-md-10 alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </fieldset>
                        <fieldset>
                            <legend>Mật khẩu của bạn</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Mật khẩu:</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Nhập mật khẩu" >
                                </div>
                            </div>
                            @if($errors->has('password'))
                                <div class="offset-md-2 col-md-10 alert alert-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                            <div class="form-group d-md-flex align-items-md-center ">
                                <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Nhập lại mật khẩu</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="re_password" id="pwd-confirm" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                            @if($errors->has('re_password'))
                                <div class="offset-md-2 col-md-10 alert alert-danger">
                                    <strong>{{ $errors->first('re_password') }}</strong>
                                </div>
                            @endif
                        </fieldset>
                        <div class="terms">
                            <div class="float-md-right pr-15">
                                <input type="submit" value="Đăng ký" class="return-customer-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->
@endsection