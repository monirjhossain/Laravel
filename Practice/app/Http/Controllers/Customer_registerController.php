<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use Hash;

class Customer_registerController extends Controller
{
    function customerregister(){
        
        return view('customer_register');
    }
    function customerregisterpost(Request $request){
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '2',
            'created_at' => Carbon::now()
        ]);
        return redirect('login');
    }
}
