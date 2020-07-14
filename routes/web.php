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



Route::group([ 'middleware' =>'Lang','namespace' => 'Front'], function () {

	Route::get("/", 'BlogController@index');
	Route::get("/posts/{post}", "BlogController@getpost");
	Route::post("/posts/search", 'BlogController@categortFilter');
	Route::get("/tag/{id}/posts", 'BlogController@tagFilter');
	Route::get("/category/{id}/posts", 'BlogController@categortPosts');


});


Route::get('lang/{lang}', function($lang) {

	session()->has('lang')? session()->forget('lang') : '';
	
	if($lang ==  "ar")
	{
		session()->put('lang','ar');
	} else {
		
		session()->put('lang','en');
	}

	return back();

});


Auth::routes();
