<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
use App\Cart;
use App\Product;
use App\Order_list;
use Auth;
use Carbon\Carbon;
   
class StripePaymentController extends Controller
{
   
    public function stripe()
    {
        return view('stripe');
    }
  
    public function stripePost(Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from Nir E-Shop" 
        ]);

         //Insert into order table.
       $order_id = Order::insertGetId([
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
        'sub_total' => $request->sub_total,
        'total' => $request->total,
        'created_at' => Carbon::now()
    ]);

    foreach (Cart::where('ip_address', request()->ip())->get() as $cart) {
        //Insert into order list table.
        Order_list::insert([
            'order_id' => $order_id,
            'user_id' => Auth::id(),
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            'created_at' => Carbon::now()
        ]);

         //Decrement product from Product Table.
        Product::find($cart->product_id)->decrement('product_quantity', $cart->quantity);

         //Delete the cart Table.    
        Cart::find($cart->id)->delete();
    }
    return redirect('/');
    }
}
