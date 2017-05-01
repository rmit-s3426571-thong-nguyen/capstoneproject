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
Route::get('/register','RegisterController@create');
Route::get('/products/{product}','ProductController@show');


Route::get('/userproducts/{id}', 'ProductController@index2');
Route::get('/editproduct/{id}', 'ProductController@edit');

Route::get('/cart/{id}',[
    'uses' => 'ProductController@addToCart',
    'as'   => 'product.addToCart']);

Route::get('/cart',[
    'uses' => 'ProductController@cart',
    'as'   => 'product.cart']);

Route::get('/login', [
    'name' => 'login', 
]);


//GET requests through SearchController
//Route::get('/result','SearchController@index');
//Route::get('search', 'SearchController@search');


Route::get('search', array(
     'as'    =>  'search',
     'uses'  =>  'SearchController@index'
 ));



//Category
Route::resource('categories','CategoryController');


//POST request
Route::post('/products','ProductController@store');

//Route::post('/mydetails','UserController@displaydetails');
Route::post('/editpassword/{username}', 'UpdatePasswordController@update');
Route::post('/edit/{username}', 'UserController2@update');
//Route::post('/mydetails/{username}','UserController2@update_avatar');


Route::post('/edit/{id}', 'ProductController@update');

// GET views
Route::get('about',function(){
	return view('pages/about');
});

Route::get('/mydetails/{username}', 'UserController2@index');
Route::get('/editpassword/{username}', 'UpdatePasswordController@edit');
Route::get('/edit/{username}', 'UserController2@edit');



//Route::get('/edit/{username}', 'userController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('users', 'UserController2');
Route::resource('product', 'ProductController' );

Route::resource('password', 'UpdatePasswordController');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

