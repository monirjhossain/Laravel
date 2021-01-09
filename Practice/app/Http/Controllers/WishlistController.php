<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use App\Coupon;
use App\Product;
use Carbon\Carbon;

class WishlistController extends Controller
{
    function addtowishlist(Request $request, $product_id)
    {
        // aikhane relation hobe one to many...avabe korle hobe na vai 

        $previous = count(Wishlist::where('product_id', $product_id)->get());
        if ($previous > 0) {
            $wishlist = Wishlist::where('product_id', $product_id)->first();
            $wishlist->quantity = $wishlist->quantity + 1;
            $wishlist->save();
        } else {
            Wishlist::insert([
                'product_id' => $product_id,
                'quantity' => 1,
                'ip_address' => request()->ip(),
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Item added to the Wishlist');
    }

    function wishlist()
    {
        return view('wishlist', [
            'wishlists' => Wishlist::where('ip_address', request()->ip())->get()
        ]);
    }

    function wishlistdelete($wishlist_id)
    {
        Wishlist::find($wishlist_id)->delete();
        return back();
    }
}
