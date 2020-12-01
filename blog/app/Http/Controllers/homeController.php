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
        return view('form/myform');
    }

    // public function process(Request $r){
    //     echo $r->method().'<br>';
    //     if($r->method()=='POST'){
    //         echo 'method get';
    //     }
    //     else{
    //         echo 'not get';
    //     }
        
    // }

    public function process(Request $r){
        // print_r( $r->all()). '<br>';

        $name = $r->input('name');
        $email=$r->input('email');
        $mobile=$r->input('mobile');
        $roll=$r->input('roll');
        $status=$r->input('status');

        $data=DB::table('students')->insert([
            ['id'=>'', 'name' => $name, 'email' => $email,'mobile' => $mobile, 'roll' => $roll,'status' => $status],
        ]);
 
       echo $data?"Insert Success":"Data Insert Fail";

        // DB::insert('insert into students (name,email,mobile,roll,status) values (?,?, ?,?, ?)', [$name,$email,$mobile,$roll,$status]);
        
    }

}


