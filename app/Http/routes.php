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


Route::get('/', function() {
	return redirect("/login");
});
//Route::group(array("middleware" => 'auth'), function() {
//Route::resource('admin/users','admin\UserController');
//Route::resource('admin/products','admin\ProductController');
//Route::resource('admin/notices','admin\NoticeController');
//Route::resource('admin/discuss','admin\DiscussController');

//Route::get('/admin/users','admin\UserController@index');
Route::get('/login','frontend\LoginController@index');
Route::post('/login','frontend\LoginController@login');
Route::get('/home','frontend\HomeController@index');
Route::get('/clients','frontend\ClientController@index');
Route::get('/business/dashboard','frontend\BusinessController@index');
Route::get('/promote/overview','frontend\promoteController@index');