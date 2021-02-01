<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   function addcategory(){
        $categories = Category::all();
        $deleted_categories = Category::onlyTrashed()->get();
        return view('/admin/category/index', compact('categories','deleted_categories'));
   }
   function categorypost(Request $request){
    $request->validate([
        'category_name' => 'required|unique:categories,category_name'
    ],
    [
        //Custom message for field. 
        // 'category_name.required' => 'Tomar Category koi?'
    ]);
        //Insert data on Database
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'category_photo' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        // Photo Upload start
        $uploaded_photo = $request->file('category_photos');
        $new_name = $category_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/category_photos/' .$new_name);
        Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location, 50);
        // Photo Upload end

        Category::find($category_id)->update([
            'category_photo'=>$new_name
        ]);

        return back()->with('success_message','Your Category inserted has been successfull');   
}

    function updatecategory($category_id){
        $category_name = Category::find($category_id)->category_name;
        $category_photo = Category::find($category_id)->category_photo;
        return view('admin/category/update', compact('category_name', 'category_id','category_photo')); 
    }

    function updatecategorypost(Request $request){
        if($request->hasFile('new_category_photo')){
            // Old photo delete start
        $delete_photo_location = base_path('public/uploads/category_photos/' . Category::find($request->category_id)->category_photo);
        unlink($delete_photo_location);
            // new photo delete end

        // new photo update start
        $uploaded_photo = $request->file('new_category_photo');
        $new_name = $request->category_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/category_photos/' .$new_name);
        Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location, 50);
        // new photo update end

        // new photo information update start
        Category::find($request->category_id)->update([
            'category_photo' => $new_name
        ]);
        // new photo information update end
        }
        
        
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

        $delete_photo_location = base_path('public/uploads/category_photos/' . Category::onlyTrashed()->find($category_id)->category_photo);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        unlink($delete_photo_location);
        return back()->with('hardDelete_status','Your Category has been Permanently Deleted!');
    }

}
