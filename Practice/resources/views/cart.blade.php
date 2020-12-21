@extends('layouts.frontend_master')
@section('frontend_content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
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
                @if (session('invalid_error'))
                    <div class="alert alert-danger">
                        {{ session('invalid_error') }}
                    </div>
                @endif
                @if (session('non_exist_error'))
                    <div class="alert alert-danger">
                        {{ session('non_exist_error') }}
                    </div>
                @endif
                    <form action="{{ url('cart/update') }}" method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total_cart = 0;
                                @endphp
                                
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="images"><img src="{{ asset('uploads/product_photos') }}/{{ App\Product::find($cart->product_id)->product_thumbnail_photo }}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{ App\Product::find($cart->product_id)->product_name}}</a></td>
                                    <td class="ptice">${{ App\Product::find($cart->product_id)->product_price }}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" value="{{ $cart->quantity }}" name="cart_quantity[{{$cart->id}}]"/>
                                    </td>
                                    <td class="total">
                                        {{ App\Product::find($cart->product_id)->product_price * $cart->quantity  }}
                                    </td>
                                    @php
                                    $sub_total_cart = $sub_total_cart + (App\Product::find($cart->product_id)->product_price * $cart->quantity);
                                    @endphp

                                    <td class="remove">
                                        <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                    </form>
                                        <li><a href="{{ url('shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div>
                                        <input type="text"  id="coupon_text" placeholder="Cupon Code" value="{{$coupon_name ?? ''}}">
                                        <a class="btn btn-danger" id="apply-coupon-btn">Apply Coupon</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $sub_total_cart }}</li>
                                           
                                        <li><span class="pull-left">Discount Amount </span>${{ $discount_amount ?? ''}}</li>
                                        @isset($discount_amount)
                                        <li><span class="pull-left"> Total </span> ${{ $sub_total_cart - ($sub_total_cart * ($discount_amount/100)) }}</li>
                                        @else
                                        <li><span class="pull-left"> Total </span>${{ $sub_total_cart }}</li>
                                        @endisset
                                    </ul>
                                    <a href="checkout.html">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection