<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index($a, $b){
    	echo "Hello World". $a.$b;
    }

    public function getUrl(Request $request){
    	echo 'my name is '.$request->name;
    }

    public function getUser(){
    	$users = DB::Table('users')->get();
    	return view('pages.users', ['users'=> $users]);
    }

    public function hello(){
        $data = DB::Table('users')->get();
        return view('pages.hello', ['userdata'=>$data]);
    }

    public function form(){
        return view('myform');
    }

    public function process(Request $req){
        
            echo "Your Name is " . $req->input('name');
            echo "<br>";
            echo "Your Email is " . $req->input('email');
            echo "<br>";
            echo "Your Address is " . $req->input('address');
        
    }

}


