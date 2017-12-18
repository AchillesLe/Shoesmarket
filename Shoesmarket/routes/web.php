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
 

	Route::get('/','User\pageController@getIndex');

// Phần của Vân đom -- user

	Route::get('/home','User\pageController@getIndex')->name('home');
	Route::get('/detail/{name_meta}','User\pageController@getdetailProduct')->name('detail.product');
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
		Route::post('payment','User\OrdersController@payment');

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
			Route::get('completebill/{id}',['as' => 'completeBill', 'uses' => 'seller\OrderController@completeBill']);
			Route::get('cancelbill/{id}',['as' => 'cancelBill', 'uses' => 'seller\OrderController@cancelBill']);
			Route::get('detail/{id}',['as' => 'getDetailBill', 'uses' => 'seller\OrderController@getDetailBill']);
			Route::get('detail/completebill/{id}',['as' => 'completeDetailBill', 'uses' => 'seller\OrderController@completeDetailBill']);
			Route::get('detail/cancelbill/{id}',['as' => 'cancelDetailBill', 'uses' => 'seller\OrderController@cancelDetailBill']);
			Route::get('statistics',['as' => 'getStatistics', 'uses' => 'seller\OrderController@getStatistics']);
			Route::get('statisticsbill',['as' => 'statisticsBill', 'uses' => 'seller\OrderController@statisticsBill']);
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

		Route::get('admin/login','admin\AdminLoginController@getlogin')->name('admin.login');
		Route::post('admin/login','admin\AdminLoginController@postlogin');
		Route::get('admin/changepass','admin\AdminChangePassWord@getchangePass')->name('admin.getchangepass');
		Route::post('admin/changepass','admin\AdminChangePassWord@changePass');

	Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

		Route::get('logout','admin\AdminLoginController@logout')->name('admin.logout');

		
		Route::get('/','admin\newsController@getDashboard')->name('admin.dashboard');
		Route::group(['prefix'=>'news'],function(){
			
			Route::get('detail/{id}','admin\newsController@detailsnew');
		});

		Route::group(['prefix'=>'user'],function(){
			Route::get('list','admin\userController@getlist');
			Route::get('detail/{id}','admin\userController@getdetail');
			Route::get('edit/{id}','admin\userController@editStatus');
			Route::get('delete/{id}','admin\userController@delete');

		});
		Route::group(['prefix'=>'type'],function(){
			Route::get('list','admin\typeController@getlist');
			Route::post('update','admin\typeController@update');
			Route::get('updatestatus/{id}','admin\typeController@updatestatus');
		});
		Route::group(['prefix'=>'producttype'],function(){
			Route::get('list','admin\producttypeController@getlist');
			Route::post('update','admin\producttypeController@update');
			Route::get('updatestatus/{id}','admin\producttypeController@updatestatus');
		});
		Route::group(['prefix'=>'package'],function(){
			Route::get('list','admin\packageController@getlist');
			Route::post('update','admin\packageController@update');
			Route::get('delete/{id}','admin\packageController@delete');
		});
		Route::group(['prefix'=>'seller'],function(){
			Route::get('list','admin\sellerController@getlist')->name('admin.listseller');
			Route::get('updatestatus/{id}','admin\sellerController@updatestatus');
			Route::get('sellpackage/{id}','admin\sellerController@sellpackage')->name('sellpackage');
			Route::post('sellpackage','admin\sellerController@postsellpackage')->name('post.sellpackage');

		});
		Route::group(['prefix'=>'penalize'],function(){
			Route::get('list','admin\penalizeController@index')->name('admin.penalize');
			Route::get('create/{id}','admin\penalizeController@create')->name('admin.penalize.create');
			Route::post('create/{id}','admin\penalizeController@createpost')->name('admin.penalize.post');
		});
		Route::group(['prefix'=>'employee'],function(){
			Route::get('list','admin\employeeController@index')->name('admin.employee');
			Route::post('update','admin\employeeController@update');
			Route::get('edit/{id}','admin\employeeController@editStatus');
			Route::get('create','admin\employeeController@create');
		});
		Route::group(['prefix'=>'mail'],function(){
			Route::get('list','admin\mailController@index')->name('admin.mail');
			Route::get('create/{id}','admin\mailController@create')->name('admin.mail.create');
			Route::post('createsubmit','admin\mailController@createsubmit');
			Route::get('getcontent/{id}','admin\mailController@getcontent')->name('admin.mail.get.content');
			Route::get('mailtemplate','admin\mailController@listmailtemplate')->name('admin.mail.listmailTemplate');
			Route::post('updatemailTemplate','admin\mailController@updatemailTemplate')->name('admin.mail.updatemailTemplate');
			Route::get('mailtemplate/delete/{id}','admin\mailController@delete')->name('admin.mail.deletemailTemplate');
		});

		Route::get('/revenue/interval','admin\revenueController@revenue')->name('revenue');
		Route::post('/revenue/interval','admin\revenueController@getrevenue')->name('revenue.interval');
		Route::get('/receipt/index','admin\receiptController@index')->name('admin.receipt');
		Route::get('/bill/index','admin\billController@index')->name('admin.bill');
		Route::get('/bill/detail/{id}','admin\billController@detail')->name('admin.bill.detail');

		
	});

