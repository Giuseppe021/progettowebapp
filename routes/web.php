<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home')->with('superadmin', false);
});


Route::get('login', 'App\Http\Controllers\LoginController@login_form'); 
Route::post('login', 'App\Http\Controllers\LoginController@do_login'); 
Route::get('register', 'App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register'); 
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('listPopularProducts', 'App\Http\Controllers\HomeController@listPopularProducts');
Route::get('product/{id}', 'App\Http\Controllers\HomeController@product');
Route::get('allproducts', 'App\Http\Controllers\HomeController@allProducts');
Route::get('getAllProducts', 'App\Http\Controllers\HomeController@getAllProducts');
Route::get('home/search/{search}', 'App\Http\Controllers\HomeController@search');


Route::get('addtocart/{product}', 'App\Http\Controllers\CartController@addtocart');
Route::get('viewcart', 'App\Http\Controllers\CartController@viewcart');
Route::get('getcartdata', 'App\Http\Controllers\CartController@getCartData');
Route::get('removefromcart/{product_id}', 'App\Http\Controllers\CartController@removefromcart');

Route::get('viewrepairs', 'App\Http\Controllers\RepairController@viewrepairs');
Route::get('listrepairs', 'App\Http\Controllers\RepairController@listRepairs');
Route::get('getNameUser/{id}', 'App\Http\Controllers\RepairController@getNameUser');
Route::get('remove-repair/{id}', 'App\Http\Controllers\RepairController@removeRepair');
Route::post('addrepair', 'App\Http\Controllers\RepairController@addRepair');
// Route::post('updaterepair', 'App\Http\Controllers\RepairController@updateRepair');

Route::get('profile', 'App\Http\Controllers\UserController@profile');
Route::get('getUserProfile', 'App\Http\Controllers\UserController@getUserProfile');
Route::post('updateUserProfile', 'App\Http\Controllers\UserController@updateUserProfile');





