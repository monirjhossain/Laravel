<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use App\Product;
use Carbon\Carbon;

class WishlistController extends Controller
{

    function index(){
        return view('wishlist', [
            'carts' => Cart::where('ip_address', request()->ip())->get()
        ]);
    }

    function wishlistdelete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }
    
}
