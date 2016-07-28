<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// Route::get('/hello', function () {
// 	return view('hello');
// });

Route::get('/hello/{nama?}', 'LaravelController@hello');
Route::get('laravel/', function () {
	return view('laravel');
});

Route::get('form', 'LaravelController@form');
Route::post('nama', 'LaravelController@getNama');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::resource('news', 'NewsController');
Route::get('berita/{slug}', 'HomeController@news');