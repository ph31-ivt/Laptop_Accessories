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
                    <li><a href="{{route('user.login.get')}}">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- LogIn Page Start -->
    <div class="log-in ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <!-- Returning Customer Start -->
                <div class="col-md-6 offset-md-3">
                    <div class="well">
                        <div class="return-customer">
                            <h3 class="mb-10 custom-title">ĐĂNG NHẬP</h3>
                            <form action="{{route('user.login.post')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="Nhập Email của bạn..." id="input-email" class="form-control" value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Password" id="input-password" class="form-control" value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <input type="submit" value="Đăng nhập" class="return-customer-btn">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Returning Customer End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- LogIn Page End -->
@endsection