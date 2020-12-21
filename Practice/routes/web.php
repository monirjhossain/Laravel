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

Route::get('/shop', 'FrontendController@shop');

//Contact Page Routes
Route::get('/contact', 'FrontendController@contact');
Route::post('/contact', 'ContactController@contactSubmit')->name('contact.submit');

//Single page Product details 
Route::get('/product/details/{product_id}', 'FrontendController@productdetails');

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

//Product Controller
Route::get('/add/product', 'ProductController@addproduct');

Route::post('/add/product/post', 'ProductController@addproductpost');

Route::get('/update/product/{category_id}', 'ProductController@updateProduct');

Route::post('/update/product/{id}', 'ProductController@updateproductpost');

//Slider Controller Routes
Route::get('add/slider', 'SliderController@addslider');


//SliderController Routes
Route::get('/add/slider', 'SliderController@addslider');

Route::post('/add/slider/post', 'SliderController@sliderpost');

Route::get('/update/slider/{slider_id}', 'SliderController@updateslider');

Route::post('/update/slider/post', 'SliderController@updatesliderpost');

Route::get('/delete/slider/{slider_id}', 'SliderController@deleteslider');

Route::get('/restore/slider/{slider_id}', 'SliderController@restoreslider');

Route::get('/harddelete/slider/{slider_id}', 'SliderController@harddeleteslider');

//Cart Controller Routes
Route::get('/cart', 'CartController@cart');

Route::get('/cart/{coupon_name}', 'CartController@cart');

Route::post('/add/to/cart', 'CartController@addtocart');

Route::get('/cart/delete/{cart_id}', 'CartController@cartdelete');

Route::post('/cart/update', 'CartController@cartupdate');

//Coupon Controller Routes
Route::get('/add/coupon', 'CouponController@addcoupon');

Route::post('/add/coupon/post', 'CouponController@addcouponpost');

//Checkout Controller Routes

Route::post('checkout', 'CheckoutController@index');
Route::post('checkout/post', 'CheckoutController@checkoutpost');

//Customer Register Controller Routes

Route::get('customer/register', 'Customer_registerController@customerregister');

Route::post('customer/register/post', 'Customer_registerController@customerregisterpost');