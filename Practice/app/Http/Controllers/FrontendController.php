<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        return view('welcome');
    }
    function about(){

        $data = "How are you";
        $arr = array('Dhaka','Rajshahi','Khulna','Dinajpur','Maymensingh','Barishal','Kishorganj');
        
        return view('about', compact('data','arr'));
    }
    function contact(){
        return view('contact');
    }
}
