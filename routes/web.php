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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/admin', function () {
    return view('admin');
	});
	Route::resource('impresoras','ImpresoraController');
	Route::post('impresoras/create', 'ImpresoraController@store');
	Route::put('impresoras/{id}/edit', 'ImpresoraController@putEdit');

	Route::resource('consumibles','ConsumibleController');
	Route::post('consumibles/create', 'ConsumibleController@store');
	Route::put('consumibles/{id}/edit', 'ConsumibleController@putEdit');

	Route::resource('cambios','UtilizaController');
	Route::post('cambios/create', 'UtilizaController@store');
	Route::put('cambios/{id}/edit', 'UtilizaController@putEdit');
});

Route::get('logout', 'Auth\LoginController@logout');