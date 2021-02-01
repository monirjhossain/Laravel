<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addtestimonial(){
        $testimonials = Testimonial::all();
        // $deleted_sliders = Slider::onlyTrashed()->get();
        return view('/admin/testimonial/index', compact('testimonials'));
   }


}
