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

//Route::get('/', function () {
  //  return view('welcome');
//});
Auth::routes();

//userLogin
Route::get('/home', 'HomeController@index')->name('home');
//
Route::get('/','User\homeController@index')->name('homepage');
Route::get('/contactus','User\homeController@contactUs')->name('contactus');
Route::get('/userdash', 'User\dashboardController@userDash')->name('userdash');
Route::get('/category/product/{id}', 'User\dashboardController@categoryProduct')->name('user.category.product');
Route::get('/admin/category/product/{id}', 'Admin\dashboardController@categoryProduct')->name('admin.category.product');


//email
Route::post('/contact/guest/feedback','User\mailController@feedbackEmail')->name('guest.sendMail.submit');

//userproduct
Route::get('/product', 'User\productController@productView')->name('user.product.view');
Route::get('/product/{id}', 'User\productController@singleview')->name('user.product.singleview');

//userorder
Route::get('/order/orderlist', 'User\orderController@orderList')->name('user.order.list');
Route::get('/order/orderlist/approved', 'User\orderController@approvedOrders')->name('user.order.approved');
Route::get('/order/placeorder', 'User\orderController@placeOrder')->name('user.order.placeorder');

Route::post('/order/addorder', 'User\orderController@addOrder')->name('user.order.addorder');
Route::get('/order/{id}/editorder', 'User\orderController@editOrder')->name('user.order.editorder');
Route::post('/order/{id}/updateorder', 'User\orderController@updateOrder')->name('user.order.update');
Route::get('/order/{id}/cancelorder', 'User\orderController@cancelOrder')->name('user.order.cancelorder');

//userfeedback
Route::get('/feedback', 'User\feedbackController@feedbackview')->name('user.user.feedback');
Route::post('/contact','User\feedbackController@userfeedback')->name('user.feedback.submit');

//userLogout
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');
Route::post('register/user','Auth\RegisterController@register')->name('user.register.submit');
Route::get('register','Auth\RegisterController@showRegisterForm')->name('user.register.show');

//adminLogin
Route::prefix('admin')->group(function(){

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/dashboard',['as'=>'admin.dashboard',
    'uses'=>'Admin\dashboardController@index']);


//adminLogout
Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});


//product

Route::get('admin/product',['as'=>'admin.product.view',
    'uses'=>'Admin\productsController@viewProduct']);

Route::get('admin/product/add',['as'=>'admin.product.add',
    'uses'=>'Admin\productsController@addProduct']);

Route::POST('admin/product/store',['as'=>'admin.product.store',
    'uses'=>'Admin\productsController@store']);


Route::get('admin/product/edit/{id}',['as'=>'admin.product.edit',
    'uses'=>'Admin\productsController@editProduct']);

Route::post('admin/product/update/{id}',['as'=>'admin.product.update',
    'uses'=>'Admin\productsController@updateProduct']);

Route::get('admin/product/delete/{id}',['as'=>'admin.product.delete',
    'uses'=>'Admin\productsController@deleteProduct']);

//Category

Route::get('admin/categories',['as'=>'admin.category.view',
    'uses'=>'Admin\categoryController@view']);

Route::get('admin/categories/add',['as'=>'admin.category.add',
    'uses'=>'Admin\categoryController@add']);

Route::POST('admin/categories/store',['as'=>'admin.category.store',
    'uses'=>'Admin\categoryController@store']);


Route::get('admin/categories/edit/{id}',['as'=>'admin.category.edit',
    'uses'=>'Admin\categoryController@edit']);

Route::post('admin/categories/update/{id}',['as'=>'admin.category.update',
    'uses'=>'Admin\categoryController@update']);

Route::get('admin/categories/delete/{id}',['as'=>'admin.category.delete',
    'uses'=>'Admin\categoryController@delete']);

//supplies


Route::get('admin/supplies',['as'=>'admin.supplies.supply',
    'uses'=>'Admin\supplyController@viewSuppliers']);

Route::get('admin/supplies/list',['as'=>'admin.supplies.list',
    'uses'=>'Admin\suppliesController@listSupply']);

Route::get('admin/supplies/addSupply',['as'=>'admin.supplies.addSupply',
    'uses'=>'Admin\supplyController@addSupply']);

Route::get('admin/supplies/edit/{id}',['as'=>'admin.supplies.edit',
    'uses'=>'Admin\suppliesController@editSupply']);

Route::POST('admin/supplies/store',['as'=>'admin.supplies.store',
    'uses'=>'Admin\suppliesController@store']);

Route::POST('admin/supplies/store/supplier',['as'=>'admin.supplies.storeSupplier',
    'uses'=>'Admin\supplyController@storeSupplier']);

Route::get('admin/supplier/delete/{id}',['as'=>'admin.supplies.deleteSupplier',
    'uses'=>'Admin\supplyController@deleteSupplier']);

Route::get('admin/supplies/delete/{id}',['as'=>'admin.supplies.deleteSupply',
    'uses'=>'Admin\suppliesController@deleteSupply']);


Route::POST('admin/supplies/update/{id}',['as'=>'admin.supplies.editSupply',
    'uses'=>'Admin\suppliesController@updateSupply']);




//users
Route::get('admin/userManagement',['as'=>'admin.userManagement.view',
    'uses'=>'Admin\userController@viewDealers']);

Route::get('admin/userManagement/addStaff',['as'=>'admin.userManagement.addStaff',
    'uses'=>'Admin\staffController@addStaff']);

Route::get('admin/userManagement/dealerRequests',['as'=>'admin.userManagement.dealerRequests',
    'uses'=>'Admin\userController@dealerRequests']);

Route::get('admin/userManagement/{id}/dealer/detail',['as'=>'admin.userManagement.dealerview',
    'uses'=>'Admin\userController@dealerView']);

Route::POST('admin/userManagement/store',['as'=>'admin.userManagement.store',
    'uses'=>'Admin\staffController@store']);

Route::POST('admin/userManagement/{id}/approve',['as'=>'admin.userManagement.approve',
    'uses'=>'Admin\userController@userApproval']);

Route::get('admin/userManagement/delete/{id}',['as'=>'admin.userManagement.delete',
    'uses'=>'Admin\staffController@deleteStaff']);





//order

Route::get('admin/order',['as'=>'admin.order.pending',
    'uses'=>'Admin\orderController@pending']);

Route::get('admin/order/approved',['as'=>'admin.order.approved',
    'uses'=>'Admin\orderController@approved']);

Route::post('admin/order/{id}/approve',['as'=>'admin.order.approve',
    'uses'=>'Admin\orderController@orderApproval']);



//payment


Route::get('admin/payment/received',['as'=>'admin.payment.received',
    'uses'=>'Admin\paymentReceivedController@received']);

Route::POST('admin/paymentReceived/store',['as'=>'admin.paymentReceived.store',
    'uses'=>'Admin\paymentReceivedController@store']);

Route::get('admin/payment/paid',['as'=>'admin.payment.paid',
    'uses'=>'Admin\paymentpaidController@paid']);

Route::POST('admin/paymentPaid/store',['as'=>'admin.paymentPaid.store',
    'uses'=>'Admin\paymentpaidController@store']);


//banners
Route::get('admin/banners',['as'=>'admin.banners.view',
    'uses'=>'Admin\bannersController@bannerList']);

Route::get('admin/banners/add',['as'=>'admin.banners.add',
    'uses'=>'Admin\bannersController@addBanner']);

Route::POST('admin/banners/store',['as'=>'admin.banners.store',
    'uses'=>'Admin\bannersController@store']);

Route::get('admin/banners/{id}/edit',['as'=>'admin.banners.edit',
'uses'=>'Admin\bannersController@editBanner']);

Route::post('admin/banners/update/{id}',['as'=>'admin.banners.update',
    'uses'=>'Admin\bannersController@updateBanner']);

Route::get('admin/banners/delete/{id}',['as'=>'admin.banners.delete',
    'uses'=>'Admin\bannersController@deleteBanner']);


