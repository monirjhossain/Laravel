<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontendController@index');

Route::get('/about', 'FrontendController@about');

Route::get('/contact', 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//CategoryController Routes
Route::get('/add/category', 'CategoryController@addcategory');

Route::post('/add/category/post', 'CategoryController@categorypost');

Route::get('/update/category/{category_id}', 'CategoryController@updatecategory');

Route::post('/update/category/post', 'CategoryController@updatecategorypost');

Route::get('/delete/category/{category_id}', 'CategoryController@deletecategory');

Route::get('/restore/category/{category_id}', 'CategoryController@restorecategory');

Route::get('/harddelete/category/{category_id}', 'CategoryController@harddeletecategory');

//Profile Controller Routes
Route::get('/profile', 'profileController@index');

Route::post('/profile/post', 'profileController@profilepost');

Route::post('/password/post', 'profileController@passwordpost');
