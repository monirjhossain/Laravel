<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
        $users = User::latest()->paginate(3);
        $total_users = User::count();

        //send data to blade via Compact.
        return view('home', compact('users','total_users'));

        ////send data to blade via Array.
        // return view('home', [
        //     'users' => $users,
        //     'total_users' => $total_users
        // ]);

        //send data to blade via With function.
        //return view('home')->with('users',$users)->with('total_users',$total_users);

    }
}
