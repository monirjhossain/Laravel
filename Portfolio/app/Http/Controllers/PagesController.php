<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{   
    //Index  page
    public function index(){
        return view('pages/index');
    }

    //Dashboard  page
    public function dashboard(){
        return view('pages/dashboard');
    }
   
    //services  page
    public function services(){
        return view('pages/services');
    }
    //portfolio  page
    public function portfolio(){
        return view('pages/portfolio');
    }
    //about  page
    public function about(){
        return view('pages/about');
    }
    //contact  page
    public function contact(){
        return view('pages/contact');
    }
    
}
