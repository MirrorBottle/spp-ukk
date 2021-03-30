<?php

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
Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {
	Route::get('/', function () {
		return redirect('/dashboard');
	});
	Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::resource('user', 'UserController');
	Route::resource('role', 'RoleController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
