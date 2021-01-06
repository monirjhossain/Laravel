<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use App\Product;
use Carbon\Carbon;

class CartController extends Controller
{
    function addtocart(Request $request){
        if(Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->exists()){
            Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->increment('quantity',$request->quantity);
        }
        else{
            echo "Available". Product::find($request->product_id)->product_quantity;
            echo "Desire". $request->quantity;
        if(Product::find($request->product_id)->product_quantity < $request->quantity){
                return back()->with('cart_error', 'You can not add product more than available product');
        }else{
                  Cart::insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'ip_address' => request()->ip(), 
            'created_at' => Carbon::now()
        ]);
            }
        }
      
        return back();
    }

    function cart($coupon_name = ""){
        if($coupon_name){
            if(Coupon::where('coupon_name', $coupon_name)->exists()){
               if(Coupon::where('coupon_name', $coupon_name)->first()->validity_date >= Carbon::now()->format('Y-m-d')){
                return view('cart', [
                    'carts' => Cart::where('ip_address', request()->ip())->get(),
                    'discount_amount' => Coupon::where('coupon_name', $coupon_name)->first()->discount_amount,
                    'coupon_name' => $coupon_name
                ]);
               }
               else
               {
                return redirect('cart')->with('invalid_error', 'Your Coupon is invalid');
               }
               
            }
            else{
                return redirect('cart')->with('non_exist_error', 'Your Coupon does not Exists here!');
            }
        }
        else {
            return view('cart', [
                'carts' => Cart::where('ip_address', request()->ip())->get()
            ]);
        }
        
    }

    function cartdelete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cartupdate(Request $request){
        foreach ($request->cart_quantity as $cart_id => $cart_updated_quantity) {
            Cart::find($cart_id)->update([
                'quantity' => $cart_updated_quantity
            ]);
        }
        return back();
    }
}
