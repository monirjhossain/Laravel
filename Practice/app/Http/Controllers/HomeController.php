<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 1){

            $users = User::latest()->paginate(3);
            $total_users = User::count();
      
            //send data to blade via Compact.
            return view('home', compact('users','total_users'));
        }else{
            return view('index', [
                'categories' => Category::all(),
                'sliders' => Slider::all(),
                'products' => Product::offset(0)->limit(8)->latest()->get(),
                'best_sells' => Product::offset(0)->limit(4)->get()
            ]);
        }

    }
}
