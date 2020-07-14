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




Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

	Route::get('/','WelcomeController@index')->name('welcome');

	//category routes
    Route::resource('categories', 'CategoryController')->except(['show']);
    //tags routes
    Route::resource('tags', 'TagController')->except(['show']);
    //posts routes
    Route::resource('posts', 'PostController')->except(['show']);
    // Route::delete('posts/delete/{$post}', 'PostController@delete');
    Route::get('posts/publish/{id}','PostController@swapPublishPost');
    Route::get('settings','SettingController@setting');
	Route::post('settingsave','SettingController@setting_save');

});