<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class FrontendController extends Controller
{
    function index(){
        
        return view('index', [
            'categories' => Category::all(),
            'products' => Product::latest()->get()
        ]);
    }
    function about(){
        return view('about');
    }
    function contact(){
        return view('contact');
    }
    
    function productdetails($product_id){
       return view('productdetails', [
        'product_info' => Product::find($product_id)
       ]);
    }
}
