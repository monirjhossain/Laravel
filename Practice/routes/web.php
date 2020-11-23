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
