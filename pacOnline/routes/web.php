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
Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);


Route::get('about',function(){
	return view('pages/about');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
