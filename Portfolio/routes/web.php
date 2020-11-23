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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index')->name('home');
Route::get('/admin/dashboard', 'PagesController@dashboard')->name('admin/dashboard');
Route::get('/admin/main', 'MainPagesController@index')->name('admin/main');
Route::get('/admin/services', 'PagesController@services')->name('admin/services');
Route::get('/admin/portfolio', 'PagesController@portfolio')->name('admin/portfolio');
Route::get('/admin/about', 'PagesController@about')->name('admin/about');
Route::get('/admin/contact', 'PagesController@contact')->name('admin/contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
