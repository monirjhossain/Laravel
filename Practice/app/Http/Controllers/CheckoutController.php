<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Cart;

use App\Order;

use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function index(Request $request){
        if(Auth::user()->role == 1){
            echo "You are an admin, You cannot buy";
        }else{
            return view('checkout', [
                'carts' => Cart::where('ip_address', request()->ip())->get(),
                'total' => $request->total
            ]);
        }
    }

    function checkoutpost(Request $request){
        Order::insert([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'notes' => $request->notes,
            'payment_option' => $request->payment_option,
            'created_at' => Carbon::now()
        ]);
        echo "Done";
        //print_r($request->all()); 
    }
}
