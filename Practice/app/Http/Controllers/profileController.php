<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class profileController extends Controller
{
    function index(){
        return view('admin/profile/index');
    }

    function profilepost(Request $req){
        $req->validate([
            'name' => 'required'
        ]);
        User::find(Auth::id())->update([
            'name' => $req->name
        ]);
        return back()->with('success_message','Your Profile has been Updated to '. $req->name);     
    }

    function passwordpost(Request $req){
        
        $req->validate([
            'old_password'=> 'required',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required'
            
        ]);
        if($req->old_password == $req->password){
           return back()->withErrors("Your password can not be old password");
        }
       $old_password_from_user = $req->old_password;
       $password_from_db = Auth::user()->password;

       if(Hash::check($old_password_from_user, $password_from_db)){
          User::find(Auth::id())->update([
              'password' => Hash::make($req->password)
          ]);
       }else{
        return back()->withErrors("Your old password does not match the db password");
       }
       return back()->with('password_change_status', 'Your password has been changed successfully');
    }
}
