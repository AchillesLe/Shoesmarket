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
	Route::get('/productType','User\pageController@getProductType');//loại sản phẩm
	Route::get('/detailproduct','User\pageController@getDetailProduct');//chi tiết sản phẩm
	Route::get('/contacts','User\pageController@getContacts');
	Route::get('/abouts','User\pageController@getAbouts');

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