<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getQueryController extends Controller
{


    // public function index(){
    // 	$data = DB::table('students')->get();
    // 	return view('form/students', ['students'=> $data]);

    // }

    //  public function edit(){
     	
    // 	$data = DB::table('students')->get();
    // 	$data = DB::table('students')->get();
    // 	return view('form/students', ['students'=> $data]);

	// }
	
	
	public function index(){
		// $rows = DB::table('students')->distinct()->get(['name']);
		// foreach($rows as $row){
		// 	echo $row->name . "<br>";
		// }

	
     
			$query = DB::table('students')->join('contacts','students.id','=','contacts.student_id')->select('name','email','phone');
			$students = $query->get();
	 
			$table="<table border='1' width='300'";
			$table.="<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
			foreach($students as $student){
	 
			$table.="<tr><td>$student->name</td><td>$student->email</td><td>$student->phone</td></tr>";
					 
			}
			$table.="</table>";
			echo $table;
		
	}

	public function studentForm(){
		return view('form/studentForm');
	}

	public function insert(Request $req){
		$data['name'] = $req->stname;
		$data['email'] = $req->email;

		if(DB::table('students')->insert($data)){
			echo 'Your data inserted';
		}
	}
}
