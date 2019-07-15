    <!-- Banner Popup Start -->
    <div class="popup_banner">
        <span class="popup_off_banner">×</span>
        <div class="banner_popup_area">
                <img src="../img/banner/pop-banner.jpg" alt="">
        </div>
    </div>
    <!-- Banner Popup End -->
   <!-- Newsletter Popup Start -->
    <div class="popup_wrapper">
        <div class="test">
            <span class="popup_off">Đống</span>
            <div class="subscribe_area text-center mt-60">
                <h2>Đăng ký nhận thông tin</h2>
                <p>Đăng ký vào danh sách gửi thư Truemart để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và thông tin giảm giá khác.</p>
                <div class="subscribe-form-group">
                    <form action="#">
                        <input autocomplete="off" type="text" name="message" id="message" placeholder="Nhập địa chỉ email của bạn">
                        <button type="submit">Đăng ký</button>
                    </form>
                </div>
                <div class="subscribe-bottom mt-15">
                    <input type="checkbox" id="newsletter-permission">
                    <label for="newsletter-permission">Không xuất hiện cửa sổ này nữa</label>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Popup End -->
    <!-- Main Header Area Start Here -->
    <header>
        <!-- Header Top Start Here -->
        <div class="header-top-area">
            <div class="container">
                <!-- Header Top Start -->
                <div class="header-top">
                    <ul>
                        <li><a href="{{route('checkout')}}">{{Cart::instance('cart')->count()>0?'Đặt Hàng':''}}</a></li>
                    </ul>
                    <ul>                                          
                        <li><a href="#" class="pr-10">{{ isset(Auth::user()->fullname)?Auth::user()->fullname:'Tài khoản' }}</a><i class="caret"></i><i class="lnr lnr-chevron-down"></i>
                            <!-- Dropdown Start -->
                            <ul class="ht-dropdown">
                            	@if(Auth::check())
                                	<li><a href="{{route('user.profile.get',Auth::user()->id)}}">Thông tin tài khoản</a></li>
                                    <li><a href="{{route('user.logout.get')}}">Đăng xuất</a></li>
                                @else
                                    <li><a href="{{route('user.login.get')}}">Đăng nhập</a></li>
                                    <li><a href="{{route('user.register.get')}}">Đăng ký</a></li>
                                @endif
                            </ul>
                            <!-- Dropdown End -->
                        </li> 
                    </ul>
                </div>
                <!-- Header Top End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Top End Here -->
        <!-- Header Middle Start Here -->
        <div class="header-middle ptb-15">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="{{route('home')}}"><img src="{{asset('img/logo/logo.png')}}" alt="logo-image"></a>
                        </div>
                    </div>
                    <!-- Categorie Search Box Start Here -->
                    <div class="col-lg-6 col-md-8 ml-auto mr-auto col-10">
                        <div class="categorie-search-box">
                            <form action="{{route('search.post')}}" autocomplete="off"  method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <select class="bootstrap-select" name="category">
                                        <option value="0">Tất cã danh mục</option>
                                        @foreach($categories as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" name="search" placeholder="Nhập từ khóa cần tìm..." value="">
                                <div class="result">
                                    <ul class="dt-result">
                                        <li></li>
                                    </ul>
                                </div>
                                <button><i class="lnr lnr-magnifier"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Categorie Search Box End Here -->
                    <!-- Cart Box Start Here -->
                    <div class="col-lg-3 col-md-12">
                        <div class="cart-box mt-all-30">
                            <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                <li><a href="{{route('cart.get')}}"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">
                                    <?php $number_cart = 0 ?>
                                    @foreach($cart as $value)
                                    <?php $number_cart++ ?>
                                    @endforeach
                                    {{ $number_cart}}</span><span>cart</span></span></a>
                                    <ul class="ht-dropdown cart-box-width">
                                        <li>
                                            @foreach($cart as $key=>$value)
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="{{route('product-detail',$value->id)}}"><img src="{{asset($value->options['image'])}}" alt="cart-image"></a>
                                                    <span class="pro-quantity">{{$value->qty}}</span>
                                                </div>
                                                <div class="cart-content">
                                                    <h6 title="{{$value->name}}"><a href="{{route('product-detail',$value->id)}}">{{$value->name}}</a></h6>
                                                    <span class="cart-price">{{number_format ( $value->price ,0 , "," ,"." )}} đ</span>
                                                </div>
                                                <a class="del-icone" href="{{route('cart.remove',$key)}}"><i class="ion-close"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            @endforeach
                                            <!-- Cart Footer Inner Start -->
                                            <div class="cart-footer">
                                               <ul class="price-content">
                                                   <li> <strong>Tổng tiền</strong> <span class="amount">{{Cart::instance('cart')->subtotal(0,',','.')}} đ</span></li>
                                               </ul>
                                                <div class="cart-actions text-center">
                                                    <a class="cart-checkout" href="{{route('checkout')}}">Đặt Hàng</a>
                                                </div>
                                            </div>
                                            <!-- Cart Footer Inner End -->
                                        </li>
                                    </ul>
                                </li>
                                <?php $number_wishlist = 0 ?>
                                @foreach($wishlist as $value)
                                    <?php $number_wishlist++ ?>
                                @endforeach
                                <li><a href="{{route('wishlist')}}"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Yêu thích<span class="wish-list">{{$number_wishlist}}</span></span></span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Cart Box End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Middle End Here -->
        <!-- Header Bottom Start Here -->
        <div class="header-bottom  header-sticky">
            <div class="container">
                <div class="row align-items-center">
                     <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                        <span class="categorie-title">Danh mục sản phẩm </span>
                    </div>                       
                    <div class="col-xl-9 col-lg-8 col-md-12 ">
                        <nav class="d-none d-lg-block">
                            <ul class="header-bottom-list d-flex">
                                <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                                <li><a href="{{route('about')}}">Thông tin</a></li>
                                <li><a href="{{route('contact')}}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Bottom End Here -->
    </header>
    <!-- Main Header Area End Here -->
    <!-- Categorie Menu & Slider Area Start Here -->
    <div class="main-page-banner pb-50 off-white-bg">
        <div class="container">
            <div class="row">
                <!-- Vertical Menu Start Here -->
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="vertical-menu mb-all-30">
                        <nav>
                            <ul class="vertical-menu-list">
                                @foreach($categories->where('parent_id',0) as $ct)
                                    <li><a href="{{route('product.get',1)}}"><span><img src="{{asset('img/vertical-menu/'.$ct->icon)}}" alt="menu-icon"></span>{{$ct->name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu first-megamenu">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile"><strong>THƯƠNG HIỆU</strong></li>
                                                    @foreach($ct->products->groupBy('producer') as $key=>$producer)
                                                        <li><a href="shop.html">{{$key}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            @foreach($categories->where('parent_id',$ct->id) as $ct_child)
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">{{$ct_child->name}}</li>
                                                    @foreach($ct_child->properties as $child)
                                                    
                                                    <li><a href="shop.html">{{$child->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                            @endforeach
                                        </ul>
                                        <!-- Vertical Mega-Menu End -->
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Vertical Menu End Here -->
                <!-- Slider Area Start Here -->
                <div class="col-xl-9 col-lg-8 slider_box">
                    <div class="slider-wrapper theme-default">
                        <!-- Slider Background  Image Start-->
                        <div id="slider" class="nivoSlider">
                            <a href="shop.html"><img src="{{asset('img/slider/1.jpg')}}" data-thumb="img/slider/1.jpg" alt="" title="#htmlcaption" /></a>
                            <a href="shop.html"><img src="{{asset('img/slider/2.jpg')}}" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                        </div>
                        <!-- Slider Background  Image Start-->
                    </div>
                </div>
                <!-- Slider Area End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Categorie Menu & Slider Area End Here -->