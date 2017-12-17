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
	Route::get('/detail/{id}','User\pageController@getdetailProduct')->name('detail.product');
	Route::get('/productType/{name}','User\pageController@getProductType');
	Route::get('/product/{sex}/{name}','User\pageController@getProductbysexandtype');
	Route::post('product/checkquantity','User\pageController@checkquantity');
	Route::get('search/{keyword}','User\pageController@Search');

	// Route::get('/contacts','User\pageController@getContacts');
	// Route::get('/abouts','User\pageController@getAbouts');


	Route::get('login','User\LoginController@getlogin')->name('login');
	Route::post('login','User\LoginController@postlogin');
	
	Route::get('register','User\LoginController@register')->name('register');
	Route::post('register','User\LoginController@postregister');
	Route::get('password/reset','User\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email','User\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::post('password/reset', 'User\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('password.reset');
	Route::group(['middleware'=>'auth'],function(){
		Route::get('logout','User\LoginController@logout');
		Route::get('order/{id}','User\OrdersController@Order');
		Route::get('list/order','User\OrdersController@ListOrder')->name('list.order');
		Route::post('updateOrder','User\OrdersController@UpdateOrder');
		Route::get('edit/{rowId}','User\OrdersController@getedit');
		Route::get('removerorder/{rowId}','User\OrdersController@removerorder');
	});
//bao-  phần tin tức.
	

// Phần của Khang -- Seller ( Tạo nhóm Route)
		Route::get('sellercenter/login', ['as' => 'seller.login', 'uses' => 'seller\SellerLoginController@getLogin']);
		Route::post('sellercenter/login', ['as' => 'seller.login.post', 'uses' => 'seller\SellerLoginController@postLogin']);
		Route::get('sellercenter/register', ['as' => 'seller.register', 'uses' => 'seller\SellerLoginController@getRegister']);
		Route::post('sellercenter/register', ['as' => 'seller.register.post', 'uses' => 'seller\SellerLoginController@postRegister']);


		Route::get('sellercenter/password/reset', 'seller\SellerForgotPasswordController@showLinkRequestForm')->name('seller.password.request');
		Route::post('sellercenter/password/email', 'seller\SellerForgotPasswordController@sendResetLinkEmail')->name('seller.password.email');
		Route::get('sellercenter/password/reset/{token}', 'seller\SellerResetPasswordController@showResetForm')->name('seller.password.reset');
		Route::post('sellercenter/password/reset', 'seller\SellerResetPasswordController@reset');

	Route::group(['prefix'=>'sellercenter','middleware'=>'auth:seller'],function(){
		
		Route::get('/logout', ['as' => 'seller.logout', 'uses' => 'seller\SellerLoginController@logout']);

		Route::get('/','seller\pageController@getDashboard');
		Route::get('/dashboard','seller\pageController@getDashboard')->name('seller.dashboard');
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

			//---------------------------
		});
		Route::group(['prefix'=>'orders'],function(){
			Route::get('listorder',['as' => 'getListOrder', 'uses' => 'seller\OrderController@getListOrder']);
		});
		// route for view/blade file
		//---------------------------
		Route::get('cart/{id}',['as' => 'getCart', 'uses' => 'seller\PaypalController@getCart']);
		//-------------------------
		// route for post request
		//-------------------------
		Route::post('paypal', 'seller\PaypalController@postPaymentWithpaypal')->name('seller.paypal');
		//---------------------------------
		// route for check status responce
		//---------------------------------
		Route::get('paypal','seller\PaypalController@getPaymentStatus')->name('status');
	
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

