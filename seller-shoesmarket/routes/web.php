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

Route::group(['prefix'=>'sellercenter'],function(){

	Route::get('login', ['as' => 'seller.login', 'uses' => 'seller\SellerAuthController@getLogin']);
	Route::post('/login', ['as' => 'seller.login.post', 'uses' => 'seller\SellerAuthController@postLogin']);
	Route::get('/register', ['as' => 'seller.register', 'uses' => 'seller\SellerAuthController@getRegister']);
	Route::post('/register', ['as' => 'seller.register.post', 'uses' => 'seller\SellerAuthController@postRegister']);

	Route::get('/','seller\pageController@getDashboard');
	Route::get('/dashboard','seller\pageController@getDashboard')->name('dashboard');
	Route::get('feeship-config',['as' => 'getFeeshipConfig', 'uses' => 'seller\FeeshipController@getFeeshipConfig']);

	Route::group(['prefix'=>'products'],function(){
		Route::get('listproduct',['as' => 'getListProduct', 'uses' => 'seller\ProductController@getListProduct']);
	});
	Route::group(['prefix'=>'news'],function(){
		Route::get('buypackage',['as' => 'getBuyPackage', 'uses' => 'seller\NewsController@getBuyPackage']);
		Route::get('add',['as' => 'getAddNews', 'uses' => 'seller\NewsController@getAddNews']);
		Route::get('post-add',['as' => 'postAddNews', 'uses' => 'seller\NewsController@postAddNews']);
		Route::get('edit',['as' => 'getEditNews', 'uses' => 'seller\NewsController@getEditNews']);
		Route::get('newsorder',['as' => 'getListOrderNews', 'uses' => 'seller\NewsController@getListOrderNews']);
	});
	Route::group(['prefix'=>'orders'],function(){
		Route::get('listorder',['as' => 'getListOrder', 'uses' => 'seller\OrderController@getListOrder']);
	});
	//---------------------------
	// route for view/blade file
	//---------------------------
	Route::get('cart/{id}',['as' => 'getCart', 'uses' => 'seller\PaymentController@getCart']);
	//-------------------------
	// route for post request
	//-------------------------
	Route::post('paypal', 'seller\PaymentController@postPaymentWithpaypal')->name('paypal');
	//---------------------------------
	// route for check status responce
	//---------------------------------
	Route::get('paypal','seller\PaymentController@getPaymentStatus')->name('status');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
