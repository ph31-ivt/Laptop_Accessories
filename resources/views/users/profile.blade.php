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
                <li class="active"><a href="{{route('user.profile.get',Auth::user()->id)}}">Thông tin tài khoản</a></li>
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
            <div class="col-lg-12 pb-15">
                <div class="checkbox-form mb-sm-40">
                    <h3>Thông tin tài khoản</h3>
                    <div class="row">
                    	<form action="{{route('update.profile.put',Auth::user()->id)}}" class="col-md-12" id="checkout-infor-form" method="POST">
                    		@csrf
                    		@method('PUT')
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list clearfix mb-sm-30">
                                    <label>Họ và tên<span class="required">*</span></label>
                                    <input type="text" class="form-control edit-profile" name="fullname" placeholder="Nhập Họ và tên" value="{{Auth::check()?Auth::user()->fullname:old('fullname')}}" readonly/>
                                    @if($errors->has('fullname'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list clearfix mb-sm-30">
                                    <label>Giới tính<span class="required">*</span></label>
                                </div>
                                <div>
	                                <label  class="checkbox-inline" for="nam"><input type="radio" name="gender" value="nam" id="nam" {{Auth::check()?Auth::user()->userprofile?Auth::user()->userprofile->gender=='nam'?'checked':'':'checked':'checked'}} /> Nam</label>
	                            	<label class="checkbox-inline ml-15" for="nu"><input type="radio" name="gender" value="nu" id="nu" {{Auth::check()?Auth::user()->userprofile?Auth::user()->userprofile->gender=='nu'?'checked':'':'':''}}  /> Nữ</label>
                            	</div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" class="form-control edit-profile" name="address" placeholder="Nhập địa chỉ" value="{{Auth::check()?Auth::user()->userprofile?Auth::user()->userprofile->address:old('address'):old('address')}}" readonly/>
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
                                    <input type="email" class="form-control edit-profile" name="email" placeholder="Nhập địa chỉ Email" value="{{Auth::check()?Auth::user()->email:old('email')}}" readonly/>
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
                                    <input type="text" class="form-control edit-profile" name="phone" placeholder="Nhập số điện thoại của bạn" value="{{Auth::check()?Auth::user()->userprofile?Auth::user()->userprofile->phone:old('phone'):old('phone')}}" readonly />
                                    @if($errors->has('phone'))
                                        <div class="col-md-12 alert alert-danger">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc mb-15">
                                    <input id="cbox-edit" type="checkbox" name="register"  />
                                    <label>Chỉnh sữa thông tin tài khoản</label>
                                </div>
                            </div>
                            <div class="box-hidden">
                                <div class="float-md-right pr-15">
                                    <input type="submit" value="Cập nhật" id="bt-update" class="return-customer-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-25">
                <div class="your-order">
                    <h3 class="text-center">Đơn hàng</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="product-name" style="width:50px;">STT</th>
                                    <th class="product-name ">Mã đơn hàng</th>
                                    <th class="product-number" style="width:150px;">Ngày đặt hàng</th>
                                    <th class="product-total">Tổng đơn hàng</th>
                                    <th class="product-total">Tình trạng đơn hàng</th>
                                    <th class="product-total">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count_od = 0 ?>
                                @foreach($orders as $od)
                                    <?php $count_od++ ?>
                                    <tr class="order_item">
                                        <td class="product-name text-center ">
                                            {{$count_od}}
                                        </td>
                                        <td class="product-name text-center ">
                                            {{$od->code_order}}
                                        </td>
                                        <td class="product-name text-center">
                                            {{stristr($od->created_at,' ',true)}}
                                        </td>
                                        <td class="product-name text-center">
                                            <span class="amount">{{number_format($od->total_price,0,',','.')}} đ</span>
                                        </td>
                                        <td class="product-name text-center">
                                            {{$od->status==0?'Đang chờ xác nhận':($od->status==1?'Đã xác nhận đang chuyển hàng':($od->status==2?'Đã thanh toán':'Đã hũy'))}}
                                        </td>
                                        <td class="product-total">
                                            <div class="btn-group-vertical">
                                                <button type="button" class="btn btn-primary mb-1 detail-bt" data-toggle="modal" data-target="#myModal " value="{{$od->id}}">Xem chi tiết</button>
                                                <button type="button" value="{{$od->id}}" data-name="cancel" class="btn btn-danger" {{$od->status>0?'disabled':''}}>Hủy đơn hàng</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-capitalize">Chi tiết Đơn hàng </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="table-content table-responsive mb-45">
                <table>
                    <thead>
                        <tr>
                            <th class="product-thumbnail"><strong>Hình ảnh</strong></th>
                            <th class="product-name"><strong>Sản phẩm</strong></th>
                            <th class="product-price"><strong>Giá</strong></th>
                            <th class="product-quantity"><strong>Số lượng</strong></th>
                            <th class="product-subtotal"><strong>Tổng giá</strong></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection

