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

// All request go through this route will redirect to ProductController

//GET request 
Route::get('/','ProductController@index');

Route::get('/products/create','ProductController@create');

Route::get('/products/{product}','ProductController@show');

Route::get('/cart/{id}',[
    'uses' => 'ProductController@addToCart',
    'as'   => 'product.addToCart']);

Route::get('/cart',[
    'uses' => 'ProductController@cart',
    'as'   => 'product.cart']);

//POST request
Route::post('/products','ProductController@store');






Route::get('about',function(){
	return view('pages/about');
});



Auth::routes();

Route::get('/home', 'HomeController@index');


