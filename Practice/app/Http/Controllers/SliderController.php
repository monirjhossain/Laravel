<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slider;
use Auth;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   function addslider(){
        $sliders = Slider::all();
        // $deleted_sliders = Slider::onlyTrashed()->get();
        return view('/admin/slider/index', compact('sliders'));
   }
   function sliderpost(Request $request){
    //    return $request->all();
    $request->validate([
        'slider_title' => 'required|unique:sliders,slider_title'
    ],
    [
        //Custom message for field. 
        // 'slider_name.required' => 'Tomar slider koi?'
    ]);
        //Insert data on Database
        $slider_id = Slider::insertGetId([
            'slider_title' => $request->slider_title,
            'slider_subtitle' => $request->slider_subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'slider_description' => $request->slider_description,
            'user_id' => Auth::user()->id,
            'slider_image' => $request->slider_title,
            'created_at' => Carbon::now()
        ]);

        // Photo Upload start
        $uploaded_photo = $request->file('slider_image');
        $new_name = $slider_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/slider_photos/' .$new_name);
        Image::make($uploaded_photo)->resize(1920,1000)->save($new_upload_location, 50);
        // Photo Upload end

        slider::find($slider_id)->update([
            'slider_image'=>$new_name
        ]);

        return back()->with('success_message','Your slider inserted has been successfull');   
}

    function updateslider($slider_id){
        $slider = Slider::find($slider_id);
        return view('admin/slider/update', compact('slider')); 
    }

    function updatesliderpost(Request $request){
        if($request->hasFile('new_slider_photo')){
            // Old photo delete start
        $delete_photo_location = base_path('public/uploads/slider_photos/' . Slider::find($request->slider_id)->slider_image);
        unlink($delete_photo_location);
            // new photo delete end

        // new photo update start
        $uploaded_photo = $request->file('new_slider_photo');
        $new_name = $request->slider_id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/slider_photos/' .$new_name);
        Image::make($uploaded_photo)->resize(1920,1000)->save($new_upload_location, 50);
        // new photo update end

        // new photo information update start
        Slider::find($request->slider_id)->update([
            'slider_image' => $new_name,
            'slider_title' => $request->slider_title,
            'slider_subtitle' => $request->slider_subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'slider_description' => $request->slider_description
        ]);
        // new photo information update end
        }
        
        
        slider::find($request->slider_id)->update([
            'slider_name' => $request->slider_name
        ]);
        return back()->with('update_status','slider updates successfully!');
    }
    
    function deleteslider($slider_id){
        Slider::find($slider_id)->delete();
        return back()->with('delete_status', 'Your slider has been deleted Successfully!');
    }

    function restoreslider($slider_id){
        Slider::withTrashed()->find($slider_id)->restore();
        return back()->with('restore_status','Your Deleted slider has been Restored!');
    }

    function harddeleteslider($slider_id){

        $delete_photo_location = base_path('public/uploads/slider_photos/' . Slider::onlyTrashed()->find($slider_id)->slider_photo);
        Slider::onlyTrashed()->find($slider_id)->forceDelete();
        unlink($delete_photo_location);
        return back()->with('hardDelete_status','Your slider has been Permanently Deleted!');
    }

}