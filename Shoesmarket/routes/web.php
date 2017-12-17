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
	Route::get('/detailproduct','User\pageController@getDetailProduct');

// Phần của Khang -- Seller ( Tạo nhóm Route)

	Route::group(['prefix'=>'sellercenter'],function(){
			Route::get('/','seller\pageController@getDashboard');
			Route::get('/dashboard','seller\pageController@getDashboard')->name('dashboard');
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
			Route::get('create','admin\penalizeController@create')->name('admin.penalize.create');
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

		Route::get('/revenue/interval','admin\revenueController@revenue');
		Route::post('/revenue/interval','admin\revenueController@getrevenue');
		Route::get('/receipt/index','admin\receiptController@index')->name('admin.receipt');
		Route::get('/bill/index','admin\billController@index')->name('admin.bill');
		Route::get('/bill/detail/{id}','admin\billController@detail')->name('admin.bill.detail');

		
	});
