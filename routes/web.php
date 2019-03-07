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
	Route::get('/{local?}', function($local = 'en'){
		app()->setlocale($local);
		
		return view('master', compact('local'));
	});

	// CASH ROUTER

	Route::resource('/{local}/income', 'IncomeController');
	Route::resource('/{local}/expense', 'ExpenseController');
	Route::resource('/{local}/type', 'TypeController');
	Route::resource('/{local}/users', 'UserController');
	Route::get('/{local}/users/{id}/change/password', 'UserController@changePassword')->name('user.edit.password');
	Route::post('/{local}/users/{id}/change/password', 'UserController@updatePassword')->name('user.update.password');
	Route::get("/{local}/report", "ReportController@index");



	// TONG TIN ROUTER
	Route::resource('/{local}/tongtins', 'TongTinController');
	Route::resource('/{local}/tongtin/payment/record', 'TongTinPaymentTypeController');
	Route::resource('/{local}/tongtin/payment/type', 'TongTinPaymentRecordController');
	Route::resource('/{local}/tongtin/player', 'TongTinPlayerController');
	Route::resource('/{local}/tongtin/player_list', 'TongTinPlayerListController');
});

Auth::routes();
Route::get('/{local}/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@doLogin')->name('user.doLogin');



