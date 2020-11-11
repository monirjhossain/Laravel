<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $req){
        //print_r($req->all());
        //print_r($req->input('name'));
        //print_r($req->url());
        //print_r($req->fullurl());
    print_r($req->path());
    
    }

    public function info(Request $req){
        echo "Name is " . $req->segment(2) . " and Address is " . $req->segment(3);
    }
}
