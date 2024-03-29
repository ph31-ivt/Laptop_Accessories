/*--------------------------------------------------
Template Name: Truemart;
Description: Responsive Html5 Ecommerce Template;
Template URI:;
Author Name: HasTech;
Author URI:;
Version: 1.0;

NOTE: main.js, All custom script and plugin activation script in this file. 
-----------------------------------------------------

    JS INDEX
    ================================================
    1. Newsletter Popup
    2. Mobile Menu Activation
    3. Tooltip Activation
    4.1 Vertical-Menu Activation
    4.2 Category menu Activation
    4.3 Checkout Page Activation
    5. NivoSlider Activation
    6. Hot Deal Product Activation
    7. Brand Banner Activation
    8. Electronics Product Activation
    9. Best Seller Product Activation
    10. Like Product Activation
    11. Second Hot Deal Product Activation
    12. Side Product Activation
    13. Thumbnail Product activation
    14. Countdown Js Activation
    15. ScrollUp Activation
    16. Sticky-Menu Activation
    17. Nice Select Activation
    18. Price Slider Activation
    
================================================*/

(function ($) {
    "use Strict";
    /*--------------------------
    1. Newsletter Popup
    ---------------------------*/
    // setTimeout(function () {
    //     $('.popup_wrapper').css({
    //         "opacity": "1",
    //         "visibility": "visible"
    //     });
    //     $('.popup_off').on('click', function () {
    //         $(".popup_wrapper").fadeOut(500);
    //     })
    // },700000);

    /*----------------------------
    2. Mobile Menu Activation
    -----------------------------*/
    jQuery('.mobile-menu nav').meanmenu({
        meanScreenWidth: "991",
    });

    /*----------------------------
    3. Tooltip Activation
    ------------------------------ */
    $('.pro-actions a,.quick_view').tooltip({
        animated: 'fade',
        placement: 'top',
        container: 'body'
    });

    /*----------------------------
    4.1 Vertical-Menu Activation
    -----------------------------*/
    $('.categorie-title,.mobile-categorei-menu').on('click', function () {
        $('.vertical-menu-list,.mobile-categorei-menu-list').slideToggle();
    });

    /*------------------------------
     4.2 Category menu Activation
    ------------------------------*/
    $('#cate-toggle li.has-sub>a,#cate-mobile-toggle li.has-sub>a,#shop-cate-toggle li.has-sub>a').on('click', function () {
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        } else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    $('#cate-toggle>ul>li.has-sub>a').append('<span class="holder"></span>');

    /*----------------------------
    4.3 Checkout Page Activation
    -----------------------------*/
    $('#showlogin').on('click', function () {
        $('#checkout-login').slideToggle();
    });
    $('#showcoupon').on('click', function () {
        $('#checkout_coupon').slideToggle();
    });
    $('#cbox').on('click', function () {
        $('#cbox_info').slideToggle();
    });
    $('#ship-box').on('click', function () {
        $('#ship-box-info').slideToggle();
    });

    /*----------------------------
    5. NivoSlider Activation
    -----------------------------*/
    $('#slider').nivoSlider({
        effect: 'random',
        animSpeed: 300,
        pauseTime: 5000,
        directionNav: true,
        manualAdvance: true,
        controlNavThumbs: false,
        pauseOnHover: true,
        controlNav: false,
        prevText: "<i class='lnr lnr-arrow-left'></i>",
        nextText: "<i class='lnr lnr-arrow-right'></i>"
    });

    /*----------------------------------------------------
    6. Hot Deal Product Activation
    -----------------------------------------------------*/
    $('.hot-deal-active').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 10,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            480: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    })
    $('.hot-deal-active3').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 10,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            480: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    })

    /*----------------------------------------------------
    7. Brand Banner Activation
    -----------------------------------------------------*/
    $('.brand-banner').owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        dots: false,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        smartSpeed: 1200,
        margin: 0,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            380: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    $('.brand-banner-sidebar').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        dots: false,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        smartSpeed: 1200,
        margin: 0,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            380: {
                items: 2
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
    
    /*----------------------------------------------------
    8. Electronics Product Activation
    -----------------------------------------------------*/
    $('.electronics-pro-active')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        })

    $('.electronics-pro-active2')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item').removeClass('last')
                .eq(event.item.index + event.page.size - 1).addClass('last');
        }).owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        })
    
    /*----------------------------------------------------
    9. Best Seller Product Activation
    -----------------------------------------------------*/
    $('.best-seller-pro-active').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 10,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            450: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
    $('.trending-pro-active').owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 10,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            450: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
    
    /*----------------------------------------------------
    10. Like Product Activation
    -----------------------------------------------------*/
    $('.like-pro-active').owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 10,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            450: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })

    /*----------------------------------------------------
    11. Second Hot Deal Product Activation
    -----------------------------------------------------*/
    $('.second-hot-deal-active').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target)
            .find('.owl-item').removeClass('last')
            .eq(event.item.index + event.page.size - 1).addClass('last');
    }).owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 0,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    })

    /*----------------------------------------------------
    12. Side Product Activation
    -----------------------------------------------------*/
    $('.side-product-active').owlCarousel({
        loop: false,
        nav: false,
        dots: false,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 0,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    })
        
    /*----------------------------------------------------
    12. New Product Tow For Home-2 Activation
    -----------------------------------------------------*/
    $('.latest-blog-active').owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 1500,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 20,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    })

    /*-------------------------------------
    13. Thumbnail Product activation
    --------------------------------------*/
    $('.thumb-menu').owlCarousel({
        loop: false,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        margin: 15,
        smartSpeed: 1000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 3,
                autoplay: true,
                smartSpeed: 500
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    $('.thumb-menu a').on('click', function () {
        $('.thumb-menu a').removeClass('active');
    })
    
    /*----------------------------
    14. Countdown Js Activation
    -----------------------------*/
    $('[data-countdown]').each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $this.html(event.strftime('<div class="count"><p>%D</p> <span>Days</span></div><div class="count"><p>%H</p> <span>Hours</span></div><div class="count"><p>%M</p> <span>Mins</span></div><div class="count"> <p>%S</p> <span>Secs</span></div>'));
        });
    });

    /*----------------------------
    15. ScrollUp Activation
    -----------------------------*/
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '550', // Distance from top before showing element (px)
        topSpeed: 1000, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        scrollSpeed: 900,
        animationInSpeed: 1000, // Animation in speed (ms)
        animationOutSpeed: 1000, // Animation out speed (ms)
        scrollText: '<i class="fa fa-angle-double-up" aria-hidden="true"></i>', // Text for element
        activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

    /*----------------------------
    16. Sticky-Menu Activation
    ------------------------------ */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.header-sticky').addClass("sticky");
        } else {
            $('.header-sticky').removeClass("sticky");
        }
    });
    
    /*----------------------------
    17. Nice Select Activation
    ------------------------------ */
    $('select').niceSelect();
    
    /*----------------------------
    18. Price Slider Activation
    -----------------------------*/
    var price_min = parseInt($("#price-min").val());
    var price_max = parseInt($("#price-max").val());

    $("#slider-range").slider({
        range: true,
        step: 1000,
        min: price_min,
        max: price_max,
        values: [price_min, price_max],
    slide: function( event, ui ) {
        $( "#amount" ).val( number_format(ui.values[ 0 ],0,',','.') + "đ" + " - " + number_format(ui.values[ 1 ],0,',','.') + "đ" );
        var max = ui.values[ 1 ];
        var min = ui.values[ 0 ];
        var token = $("input[name='_token']").val();
        var search = $("input[id='search']").val();
        var category = $("input[id='category']").val();
        var orderBy = $("select[name='price']").val();
        var producer = '';
        $("input[name='producer']").each(function(index, el) {
            if ( el.checked==true ) {
              producer+=(el.value)+' ';
            }
        });
        $.post('/fill/ajax',{'_token': token,'min': min,'max': max,'producer':producer.trim(),'search':search,'category':category,'orderby':orderBy}, function(data) {
           $('.result-fill').empty().html(data);

           //$('.pro-pagination').html($(".pro-pagination").html());
        });
      }
    });
    $( "#amount" ).val(  number_format($( "#slider-range" ).slider( "values", 0 ),0,',','.') + "đ" +
      " - " + number_format($( "#slider-range" ).slider( "values", 1 ),0,',','.') + "đ" );
    
    $("input[name='producer']").click(function(event) {
        var min = $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
        var token = $("input[name='_token']").val();
        var search = $("input[id='search']").val();
        var category = $("input[id='category']").val();
        var orderBy = $("select[name='price']").val();
        var producer = '';
        $("input[name='producer']").each(function(index, el) {
            if ( el.checked==true ) {
              producer+=(el.value)+' ';
            }
        });
        $.post('/fill/ajax',{'_token': token,'min': min,'max': max,'producer':producer.trim(),'search':search,'category':category,'orderby':orderBy}, function(data) {
           $('.result-fill').empty().html(data);
           $('.pro-pagination').empty();
          // $('.pro-pagination').html($(".pro-pagination").html());
        });
    });

    $("select[name='price']").change(function(event) {
        var min = $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
        var token = $("input[name='_token']").val();
        var search = $("input[id='search']").val();
        var category = $("input[id='category']").val();
        var orderBy = $("select[name='price']").val();
        var producer = '';
        $("input[name='producer']").each(function(index, el) {
            if ( el.checked==true ) {
              producer+=(el.value)+' ';
            }
        });
        $.post('/fill/ajax',{'_token': token,'min': min,'max': max,'producer':producer.trim(),'search':search,'category':category,'orderby':orderBy}, function(data) {
           $('.result-fill').empty().html(data);
           $('.pro-pagination').empty();
          // $('.pro-pagination').html($(".pro-pagination").html());
        });
    });

        
    /*--------------------------
         banner colse Popup
    ---------------------------*/
    $('.popup_off_banner').on('click', function () {
        $(".popup_banner").fadeOut(500);
    });

    /*---------------------------
        edit profile
    -----------------------------*/
    $('.box-hidden, #change-password').hide();
    $("#cbox-edit").on('click', function () {
        var evenCheckbox = $("#cbox-edit").prop('checked');
        if (evenCheckbox==true) {
            $("input.edit-profile").removeAttr("readonly",'true');
            $('.box-hidden, #change-password').slideToggle();
        }else{
            $("input.edit-profile").prop("readonly",'true');
            $('.box-hidden, #change-password').slideToggle();
        }
     })
    
    /*------------------------
        alert message
    --------------------------*/
    $("#alert-message").delay(3000).fadeOut('slow');

    /*-----------------------
        Search
    -------------------------*/
    $("input[name='search']").keyup(function() {
        $(".result").css('visibility', 'visible');
        var category = $("select[name='category']").val();
        var name = $("input[name='search']").val();
        var token = $("input[name='_token']").val();
        $.post('/search/ajax',{'_token': token,'key': name,'option': category}, function(data) {
            $('.dt-result').html(data);

        });
    });
    $("*").click(function() {
        $(".result").css('visibility', 'hidden');
    });
    
     /*-----------------------
        Checkout
    -------------------------*/
    $("input").blur(function(event) {
        var checkAuth = $("input[type='submit']").prop('disabled');
        var evenCheckbox = $("#cbox").prop('checked');
        if (checkAuth==true) {
            if (!($("input[name='fullname']").val() != '' )||!($("input[name='email']").val() != '' )||!($("input[name='phone']").val() != '' )||!($("input[name='address']").val() != '' )) {
                $('.js-message').removeClass('hidden');
                $('.js-message').addClass('show');
                $('.js-message').html('<p>Điền đầy đủ thông tin trước khi <strong>Đặt Hàng</strong></p>');
            }else{
                $('.js-message').empty().html('<p>chọn tạo một tài khoản để đăng ký tài khoản trước khi <strong>Đặt Hàng</strong></p>');
            }

            if (($("input[name='password']").val() != '' )&&($("input[name='re_password']").val() != '' )) {
                $('.js-message').removeClass('show');
                $('.js-message').addClass('hidden');
                $("input[type='submit']").removeAttr("disabled");
            }
        }
    });

    /*-----------------------
        detail order
    -------------------------*/
    $("button[data-toggle='modal']").click(function(){
        var id =  $(this).val();
        $.get('/ajax/orderdetail/'+id, function(data) {
           $('#tbody').html(data);
        });
    });
    
    /*-----------------------
        Cancel order
    -------------------------*/

    $("button[data-name='cancel']").click(function(){
        var id =  $(this).val();
        var token = $("input[name='_token']").val();
        var method = $("input[name='_method']").val();
        $.post('/ajax/cancelorder',{'_token': token,'_method': method,'id': id}, function(data) {
            $("#alert-message").addClass('alert-success').html(data).fadeIn().delay(2000).fadeOut(500);
            $(this).prop('disabled', 'true');
            location.reload();   //load lai trang
        });
    });

    /*-----------------------
        Quick View
    -------------------------*/
    $("a.quick_view").click(function(event) {
        var id =  $(this).parent().children("input").val();
        $.get('/ajax/quickview/'+id, function(data) {
            $('.body-quickview').html(data);
        });
    });

    /*-----------------------
        Rating
    -------------------------*/
    $('.review-list li>i').each(function(index){
        $(this).hover(function(){
            $(this).addClass("fa-star");
            $(this).removeClass("fa-star-o");
            $(this).nextAll().addClass("fa-star-o");
            $(this).nextAll().removeClass("fa-star");
            $(this).prevAll().addClass("fa-star");
            $(this).prevAll().removeClass("fa-star-o");
            $("input[name='rating']").val(index+1);
        });
    });

    /*-----------------------
        Comment
    -------------------------*/
    $("button#send-comment").hover(function() {
        var login = $("input[name='login']").val();
        if (login=='') {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    $("button#send-comment").click(function(event) {
        var login = $("input[name='login']").val();
        if (login=='') {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    
})(jQuery);

function number_format( number, decimals, dec_point, thousands_sep ) {
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}