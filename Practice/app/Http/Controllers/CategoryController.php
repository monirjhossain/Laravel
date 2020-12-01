<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
   function addcategory(){
        $categories = Category::all();
        $deleted_categories = Category::onlyTrashed()->get();
       return view('/admin/category/index', compact('categories','deleted_categories'));
   }
   function categorypost(Request $req){
    $req->validate([
        'category_name' => 'required|unique:categories,category_name'
    ],
    [
        //Custom message for field. 
        // 'category_name.required' => 'Tomar Category koi?'
    ]);
        //Insert data on Database
        Category::insert([
            'category_name' => $req->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success_message','Your Category inserted has been successfull');   
}

    function updatecategory($category_id){
        $category_name = Category::find($category_id)->category_name;
        return view('admin/category/update', compact('category_name', 'category_id')); 
    }

    function updatecategorypost(Request $request){
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name
        ]);
        return back()->with('update_status','Category updates successfully!');
    }
    
    function deletecategory($category_id){
        Category::find($category_id)->delete();
        return back()->with('delete_status', 'Your Category has been deleted Successfully!');
    }

    function restorecategory($category_id){
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('restore_status','Your Deleted Category has been Restored!');
    }

    function harddeletecategory($category_id){
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back()->with('hardDelete_status','Your Category has been Permanently Deleted!');
    }

}
