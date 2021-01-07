<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function addtowishlist(Request $request){
        if(Wishlist::where('product_id', $request->product_id)->where('ip_address', request()->ip())->exists()){
            Wishlist::where('product_id', $request->product_id)->where('ip_address', request()->ip())->increment('quantity',$request->quantity);
        }
        else{
            echo "Available". Product::find($request->product_id)->product_quantity;
            echo "Desire". $request->quantity;
        if(Product::find($request->product_id)->product_quantity < $request->quantity){
                return back()->with('cart_error', 'You can not add product more than available product');
        }else{
            Wishlist::insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'ip_address' => request()->ip(), 
            'created_at' => Carbon::now()
        ]);
            }
        }
      
        return back();
    }
    
    function index(){
        return Wishlist::where('product_id', $request->product_id)->where('ip_address', request()->ip());
    }
}
