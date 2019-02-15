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





Route::middleware(['auth'])->group(function () {
	Route::get('/', function(){
		return view('master');
	});

	// CASH ROUTER

	Route::resource('/income', 'IncomeController');
	Route::resource('/expense', 'ExpenseController');
	Route::resource('/type', 'TypeController');
	Route::resource('/users', 'UserController');
	Route::get('/users/{id}/change/password', 'UserController@changePassword')->name('user.edit.password');
	Route::post('/users/{id}/change/password', 'UserController@updatePassword')->name('user.update.password');
	Route::get("/report", "ReportController@index");



	// TONG TIN ROUTER
	Route::resource('/tongtin', 'TongTinController');
	Route::resource('/tongtin/payout', 'TongTinPayOutRecordController');
	Route::resource('/tongtin/player', 'TongTinPlayerController');
	Route::resource('/tongtin/player_list', 'TongTinPlayerListController');
});

Auth::routes();
Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@doLogin')->name('user.doLogin');

