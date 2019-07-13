@extends('layouts.master')
@section('title')
	<title>Liên hệ</title>
@endsection

@section('content')
	<!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="active"><a href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Contact Email Area Start -->
    <div class="contact-area ptb-100 ptb-sm-60">
        <div class="container">
            <h3 class="mtb-15 text-uppercase">Thông tin liên hệ</h3>
            <hr>
            <p class="text-capitalize mtb-15">Mọi thắc mắc hoặc góp ý, quý khách vui lòng liên hệ trực tiếp với bộ phận chăm sóc khách hàng <strong>(0236)3 888 000 (8:00 - 21:00)</strong> hoặc điền đầy đủ thông tin vào form bên dưới đây.</p>
            <form id="contact-form" class="contact-form" action="{{route('contact.post')}}" method="post">
                @csrf
                <div class="address-wrapper row">
                    <div class="col-md-12">
                        <div class="address-fname mtb-15">
                            <input class="form-control" type="text" name="fullname" placeholder="Nhập họ và tên của bạn" value="{{old('fullname')}}">
                        </div>
                        @if($errors->has('fullname'))
                            <div class="col-md-12 alert alert-danger">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="address-email mtb-15">
                            <input class="form-control" type="email" name="email" placeholder="Nhập email của bạn" value="{{old('email')}}">
                        </div>
                        @if($errors->has('email'))
                            <div class="col-md-12 alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="address-phone mtb-15">
                            <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại" value="{{old('phone')}}">
                        </div>
                        @if($errors->has('phone'))
                            <div class="col-md-12 alert alert-danger">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="address-subject mtb-15">
                            <input class="form-control" type="text" name="subject" placeholder="Nhập tiêu đề" value="{{old('subject')}}">
                        </div>
                        @if($errors->has('subject'))
                            <div class="col-md-12 alert alert-danger">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="address-textarea mtb-15">
                            <textarea name="content" class="form-control" placeholder="Nhập nội dung" value="{{old('content')}}"></textarea>
                        </div>
                        @if($errors->has('content'))
                            <div class="col-md-12 alert alert-danger">
                                <strong>{{ $errors->first('content') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <p class="form-message"></p>
                <div class="footer-content mail-content clearfix">
                    <div class="send-email float-md-right">
                        <input value="Gửi Thông Tin" class="return-customer-btn" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Email Area End -->
    <!-- Google Map Start -->
    <div class="goole-map">
        <div id="map" style="height:400px"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 60,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(16.0645203, 108.2080421), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#444444"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                                "color": "#314453"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "lightness": "-12"
                            },
                            {
                                "saturation": "0"
                            },
                            {
                                "color": "#4bc7e9"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(16.0645203, 108.2080421),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>
@endsection