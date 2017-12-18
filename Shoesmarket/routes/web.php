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
	Route::get('/productType','User\pageController@getProductType');
	Route::get('/detailproduct/{name}','User\pageController@DetailProduct');
	Route::get('/productType','User\pageController@getProductType');//loại sản phẩm
	Route::get('/detailproduct','User\pageController@getDetailProduct');//chi tiết sản phẩm
	Route::get('/contacts','User\pageController@getContacts');
	Route::get('/abouts','User\pageController@getAbouts');


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
		Route::group(['prefix'=>'news'],function(){
			Route::get('/',['as' => 'getFeeshipConfig', 'uses' => 'seller\FeeshipController@getFeeshipConfig']);

			Route::post('save',['as' => 'postSettingShipfee', 'uses' => 'seller\FeeshipController@postSettingShipfee']);

			Route::get('delete/{id}',['as' => 'deleteShipfee', 'uses' => 'seller\FeeshipController@deleteShipfee']);
		});
		Route::group(['prefix'=>'products'],function(){
			Route::get('listproduct',['as' => 'getListProduct', 'uses' => 'seller\ProductController@getListProduct']);
			Route::get('status/{id}',['as' => 'changeStatusProduct', 'uses' => 'seller\ProductController@changeStatusProduct']);
			Route::get('detail/{id}',['as' => 'detailProduct', 'uses' => 'seller\ProductController@detailProduct']);
		});
		Route::group(['prefix'=>'news'],function(){
			Route::get('listnews',['as' => 'getListNews', 'uses' => 'seller\NewsController@getListNews']);
			Route::get('buypackage',['as' => 'getBuyPackage', 'uses' => 'seller\NewsController@getBuyPackage']);
			Route::get('add',['as' => 'getAddNews', 'uses' => 'seller\NewsController@getAddNews']);
			Route::post('add',['as' => 'postAddNews', 'uses' => 'seller\NewsController@postAddNews']);
			Route::get('edit/{id}',['as' => 'getEditNews', 'uses' => 'seller\NewsController@getEditNews']);
			Route::post('edit/{id}',['as' => 'postEditNews', 'uses' => 'seller\NewsController@postEditNews']);
			Route::get('status/{id}',['as' => 'changeStatusNews', 'uses' => 'seller\NewsController@changeStatusNews']);
			Route::get('newsorder',['as' => 'getListOrderNews', 'uses' => 'seller\NewsController@getListOrderNews']);
		});
		Route::group(['prefix'=>'orders'],function(){
			Route::get('listorder',['as' => 'getListOrder', 'uses' => 'seller\OrderController@getListOrder']);
			Route::get('completebill/{id}',['as' => 'completeBill', 'uses' => 'seller\OrderController@completeBill']);
			Route::get('cancelbill/{id}',['as' => 'cancelBill', 'uses' => 'seller\OrderController@cancelBill']);
			Route::get('detail/{id}',['as' => 'getDetailBill', 'uses' => 'seller\OrderController@getDetailBill']);
			Route::get('detail/completebill/{id}',['as' => 'completeDetailBill', 'uses' => 'seller\OrderController@completeDetailBill']);
			Route::get('detail/cancelbill/{id}',['as' => 'cancelDetailBill', 'uses' => 'seller\OrderController@cancelDetailBill']);
			Route::get('statistics',['as' => 'getStatistics', 'uses' => 'seller\OrderController@getStatistics']);
			Route::get('statisticsbill',['as' => 'statisticsBill', 'uses' => 'seller\OrderController@statisticsBill']);
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

