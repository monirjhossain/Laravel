<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
   function addcategory(){
       return view('/admin/category/index');
   }
   function categorypost(Request $req){
    $req->validate([
        'category_name' => 'required'
    ],
    [
        'category_name.required' => 'Tomar Category koi?'
    ]);
       echo $req->category_name;
    
}
}
