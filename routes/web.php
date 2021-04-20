<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::get('/about', function () {
	return view('about');
})->name('about');
Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {
	Route::get('/', function () {
		return redirect('/dashboard');
	});
	Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::resource('user', 'UserController');
	Route::resource('student', 'StudentController');
	Route::resource('fee', 'FeeController');
	Route::resource('class', 'ClassController');
	Route::get('payment/export', 'PaymentController@export')->name('payment.export');
	Route::get('payment/print/{id}', 'PaymentController@print')->name('payment.print');
	Route::resource('payment', 'PaymentController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth:students', 'namespace' => 'App\Http\Controllers'], function () {
	Route::get('/', function () {
		return redirect('/student-dashboard');
	});
	Route::get('/student-dashboard', 'HomeController@index')->name('student-dashboard');
	Route::get('/password', 'StudentController@showPassword')->name('student.show-password');
	Route::post('/password', 'StudentController@password')->name('student.password');
});


