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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => ['web']], function () {
	

	Route::get('/home', 'HomeController@index');
	Route::get('/', 'ListController@show');
	Route::get('user/{id}', 'UserController@showProfile');

	Auth::routes();

	Route::get('/home', 'HomeController@index');


	Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
	Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor');
	Route::get('/2fa/validate', 'Auth\LoginController@getValidateToken');
	Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'Auth\LoginController@postValidateToken']);
	Auth::routes();

	Route::get('/home', 'HomeController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
