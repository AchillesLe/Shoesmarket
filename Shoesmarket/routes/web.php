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

// Route::get('/', function () {
//     return view('welcome');
// });
	Route::get('/','User\pageController@getIndex');

// Phần của Vân đom -- user

	Route::get('/home','User\pageController@getIndex')->name('home');
	Route::get('/contacts','User\pageController@getContacts');
	Route::get('/abouts','User\pageController@getAbouts');
	Route::get('/detailproduct/{id}','User\pageController@getdetailspro');

//bao-29/11/2017 -- phần login
	Route::get('login','User\LoginController@getlogin')->name('login');
	Route::post('login','User\LoginController@postlogin');
	Route::get('logout','User\LoginController@logout');
	Route::get('register','User\LoginController@register')->name('register');
	Route::post('register','User\LoginController@postregister');
	Route::get('password/reset','User\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email','User\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::post('password/reset', 'User\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('password.reset');
//bao-  phần tin tức.
	

// Phần của Khang -- Seller ( Tạo nhóm Route)

	Route::group(['prefix'=>'sellercenter'],function(){
			Route::get('/','seller\pageController@getDashboard');
			Route::get('/dashboard','seller\pageController@getDashboard')->name('dashboard');
		});

// Phần của Bảo -- Admin ( Tạo nhóm Route)

	Route::group(['prefix'=>'admin'],function(){
		Route::get('/','admin\pageController@getDashboard');
		Route::get('/dashboard','admin\pageController@getDashboard')->name('dashboard');

		Route::group(['prefix'=>'user'],function(){
			Route::get('list','admin\userController@getlist');
			Route::get('detail/{idtype}','admin\userController@getdetail');
			Route::get('edit/{idtype}','admin\userController@editStatus');
			Route::get('delete/{idtype}','admin\userController@delete');

		});
		Route::group(['prefix'=>'type'],function(){
			Route::get('list','admin\typeController@getlist');
			Route::post('update','admin\typeController@update');
			Route::get('delete/{id}','admin\typeController@delete');
		});
		Route::group(['prefix'=>'producttype'],function(){
			Route::get('list','admin\producttypeController@getlist');
			Route::post('update','admin\producttypeController@update');
			Route::get('delete/{id}','admin\producttypeController@delete');
		});
		Route::group(['prefix'=>'discount'],function(){
			Route::get('list','admin\discountController@getlist');
			Route::post('update','admin\discountController@update');
			Route::get('delete/{id}','admin\discountController@delete');
		});
		Route::group(['prefix'=>'package'],function(){
			Route::get('list','admin\packageController@getlist');
			Route::post('update','admin\packageController@update');
			Route::get('delete/{id}','admin\packageController@delete');
		});
		Route::group(['prefix'=>'seller'],function(){
			Route::get('list','admin\sellerController@getlist');
			Route::post('update','admin\sellerController@update');
			Route::get('updatestatus/{id}','admin\sellerController@updatestatus');
			Route::get('delete/{id}','admin\sellerController@delete');
		});
	});