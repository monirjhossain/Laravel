<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function addproduct(){
        return view('admin.product.index', [
            'categories' => Category::all()
        ]);
    }

    function addproductpost(Request $request){
        
        //return view('admin.product.index');
    }
}
