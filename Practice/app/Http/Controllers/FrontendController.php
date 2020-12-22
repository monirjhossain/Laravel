<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Slider;
use App\Product_multiple_photos;

class FrontendController extends Controller
{
    function index(){
        
        return view('index', [
            'categories' => Category::all(),
            'sliders' => Slider::all(),
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
        // return $product_id;
        // die();
        $category_id = Product::find($product_id)->category_id;
        return view('productdetails', [
        'product_info' => Product::find($product_id),
        'related_products' => Product::where('category_id', $category_id)->where('id', '!=', $product_id)->get(),
        'multiple_photos' => Product_multiple_photos::where('product_id',$product_id)->get()
       ]); 
    }
    function shop(){
        return view('shop', [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }
}
