@extends('layouts.frontend_master')
@section('frontend_content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="stock">Stock Stutus </th>
                                    <th class="addcart">Add to Cart</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($wishlists as $wishlist)
                                <tr>
                                    <td class="images"><img src="{{ asset('uploads/product_photos') }}/{{ App\Product::find($wishlist->product_id)->product_thumbnail_photo }}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{ App\Product::find($wishlist->product_id)->product_name}}</a></td>
                                    <td class="ptice">${{ App\Product::find($wishlist->product_id)->product_price }}</td>
                                    
                                    <td class="stock">
                                        @if (App\Product::find($wishlist->product_id)->product_quantity > 0)
                                        <span class="text-success">In Stock</span>
                                        @else
                                        <span class="text-danger">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td class="addcart">
                                        <a href="{{ url('add/to/cart/'.App\Product::find($wishlist->product_id)->id) }}">Add to Cart</a>
                                    </td>
                                    <td class="remove"><a href="{{ url('wishlist/delete') }}/{{ $wishlist->id }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
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
@endsection