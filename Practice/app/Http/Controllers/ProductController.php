<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function addproduct(){
        return view('admin.product.index', [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    function addproductpost(Request $request){ 
        //return $request->all();
        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_thumbnail_photo' => 'product thumbnail photo',
            'created_at'=> Carbon::now()
        ]);
        //return view('admin.product.index');
        // new photo update start
        $uploaded_photo = $request->file('product_thumbnail_photo');
        $new_name = $product_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/product_photos/' .$new_name);
        Image::make($uploaded_photo)->resize(600,622)->save($new_upload_location, 50);
        // new photo update end

        // new photo information update start
        Product::find($product_id)->update([
            'product_thumbnail_photo' => $new_name
        ]);
        // new photo information update end
        return back();
    }
}
