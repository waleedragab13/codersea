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



   Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');

    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register_admin');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::group(['prefix'  =>   'admin'], function() {
    	Route::resource('companies', 'Admin\CompanyController');
    	Route::resource('employees', 'Admin\EmployeeController');
    });
    // Route::resource('admin/companies', 'Admin\CompanyController');

    // Route::view('/home', 'home')->middleware('auth');
    // Route::view('/admin', 'admin.admin');
    Route::get('/home', function () {
    	return view('home');
	})->middleware('auth');
    Route::get('/admin', function () {
    	return view('admin.admin');
	});

	Route::get('/home', 'HomeController@index')->name('home');
