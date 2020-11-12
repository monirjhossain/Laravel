<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });


// Route::get('/getData', function()
// {
// $fetchData = DB::select('select * from users where id = ?', array(1));
// echo "<pre>";
// print_r($fetchData);
// echo "</pre>";
// });

// Route::get('/monir', function(){
// 	$fetchData = DB::select('select * from migrations where id = ?', array(1));
//  echo "<pre>";
//  print_r($fetchData);
//  echo "</pre>";
// });


// Route::get('foo', function () {
// echo 'GET Method';
// });



// Route::post('/foo', function () {
// 	echo 'POST Method';
// });


// Route::get('foo', function(){
// 	echo '<form method ="POST" action="foo">';
// 	echo 'Enter Name : <input type="text" name="name">';
// 	echo '<input type="submit" name="submit">';
// 	echo csrf_field();
// 	echo '</form>';
// });



// Route::delete('students/{name?}/{address?}/{age?}', function($name='minar', $address='feni', $age=25){
// 	echo 'Student Name is ' . $name ;
// 	echo '<br>';
// 	echo 'Student Address is ' . $address;
// 	echo '<br>';
// 	echo 'Student age is ' . $age;
// });


// Route::get('/getData', function()
// {
// $fetchData = DB::select('select * from users where id=?', array(1));
// echo "<pre>";
// print_r($fetchData);
// echo "</pre>";
// });


// Route::get('/getAll', function()
// {
// $fetchData = DB::select('select * from users');
// echo "<pre>";
// print_r($fetchData);
// echo "</pre>";

// foreach ($fetchData as $value) {
// 	echo $value->id. $value->name.'<br>';
// }
// });



// Route::get('/home/{name}/{age}','homeController@index' );
// Route::get('/geturl','homeController@getUrl' );
// Route::get('/getuser','homeController@getUser' );
// Route::get('/hello','homeController@hello' );

// Route::get('/', function () {
// return view('pages.home');
// });
// Route::get('/about', function () {
// return view('pages.about');
// });
// Route::get('/contact', function () {
// return view('pages.contact');
// });


// Route::get('/', function () {
// return view('bs_pages.home');
// });
// Route::get('/about', function () {
// return view('bs_pages.about');
// });

// Route::get('/contact', function () {
// return view('bs_pages.contact');
// });

// Route::get('/gallery', function () {
// return view('bs_pages.gallery');
// });

// Route::get('/getrequest', 'requestController@index' );
// Route::get('/getrequest/{name}/{age}', 'requestController@index' );
// Route::get('/info/{name}/{address}', 'requestController@info' );
// Route::get('/form', 'homeController@form' );
// Route::post('/process', 'homeController@process' );
// Route::get('/process', 'homeController@process' );

Route::get('/getdataa', 'getQueryController@index' );
Route::get('/getdataa/edit/{id}', 'getQueryController@edit' );

Route::get('/getquery', 'getqueryController@index');

Route::get('/studentForm', 'getQueryController@studentForm');

Route::post('/insert', 'getQueryController@insert');
