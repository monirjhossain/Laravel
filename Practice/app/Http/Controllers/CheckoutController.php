<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function index(){
        echo Auth::user()->name;
        //return view('checkout');
    }
}
