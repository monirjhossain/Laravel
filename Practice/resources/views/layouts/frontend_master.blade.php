
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nir E-Shop - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend_assets') }}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +880 1948283811</li>
                            <li><i class="fa fa-envelope"></i> md.monirjhossain@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{ url('login') }}">Login</a></li>
                                    <li><a href="{{ url('customer/register') }}">Register</a></li>
                                    <li><a href="{{ url('cart') }}">Cart</a></li>
                                    <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ url('wishlist') }}">wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('customer/register') }}"> Customer Register </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                        <img src="{{ asset('frontend_assets') }}/images/logo.png" alt="" style="width:125px">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                <li><a href="{{ url('/shop') }}">Shop</a></li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>
                                    {{ App\Wishlist::where('ip_address', request()->ip())->count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    @foreach (App\Wishlist::where('ip_address', request()->ip())->get() as $wishlist)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img style="width: 68px;" src="{{ asset('uploads/product_photos') }}/{{ App\Product::find($wishlist->product_id)->product_thumbnail_photo }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">{{ App\Product::find($wishlist->product_id)->product_name }}</a>
                                            <span>QTY : {{ $wishlist->quantity }}</span>
                                            <p>${{ App\Product::find($wishlist->product_id)->product_price * $wishlist->quantity }}</p>
                                            <i class="fa fa-times"></i>
                                            @php
                                               $sub_total = ($sub_total + App\Product::find($wishlist->product_id)->product_price * $wishlist->quantity)
                                            @endphp
                                            <a href="{{ url('wishlist/delete') }}/{{ $wishlist->id }}"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>Subtotol: <span class="pull-right">${{ $sub_total }}</span></li>
                                    <li>
                                        <a href="{{ url('wishlist') }}" class="btn btn-danger">Checkout</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>
                                    {{ App\Cart::where('ip_address', request()->ip())->count() }}    
                                </span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total = 0;
                                    @endphp

                                    @foreach (App\Cart::where('ip_address', request()->ip())->get() as $cart) 
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img style="width: 68px;" src="{{ asset('uploads/product_photos') }}/{{ App\Product::find($cart->product_id)->product_thumbnail_photo }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">{{ App\Product::find($cart->product_id)->product_name }}</a>
                                            <span>QTY : {{ $cart->quantity }}</span>
                                            <p>${{ App\Product::find($cart->product_id)->product_price * $cart->quantity }}</p>

                                            @php
                                               $sub_total = ($sub_total + App\Product::find($cart->product_id)->product_price * $cart->quantity)
                                            @endphp

                                            <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                    <li>Subtotol: <span class="pull-right">${{ $sub_total }}</span></li>
                                    <li>
                                        <a href="{{ url('cart') }}" class="btn btn-danger">Cart</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->


@yield('frontend_content')

    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="home.html">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> md.monirjhossain@gmail.com</a></li>
                                <li><a href="#"><span>Mobile:</span> 01948283811</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Chashara , Narayanganj, Bangladesh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019  All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('frontend_assets') }}/images/product/product-details.jpg" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>Pure Nature Hohey</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">$219.56</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with righteous indignation</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">Honey,</a></li>
                            <li><a href="#">Olive Oil</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('frontend_assets') }}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('frontend_assets') }}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ asset('frontend_assets') }}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('frontend_assets') }}/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('frontend_assets') }}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('frontend_assets') }}/js/scripts.js"></script> 

    <script type="text/javascript">
    $(document).ready(function() {
        $('#apply-coupon-btn').click(function(){
            var coupon_text = $('#coupon_text').val();
            var link_to_go = "{{ url('cart') }}/"+coupon_text;
            //alert(link_to_go);
            window.location.href = link_to_go; 
        });
    });
    </script>
    

</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>