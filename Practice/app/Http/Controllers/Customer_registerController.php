<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customer_registerController extends Controller
{
    function customerregister(){
        
        return view('customer_register');
    }
}
