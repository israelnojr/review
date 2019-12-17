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

Route::middleware('can:dashboardPermission')->group( function(){
Route::get('/home', 'HomeController@index')->name('home');


Route::patch('/services/{id}', 'ServiceController@status')->name('service.status');
Route::get('/services/orders', 'ServiceController@Orders')->name('orders');
Route::get('/services/contact-list', 'ServiceController@contactList')->name('contactlist');
Route::patch('/services/order/{id}', 'ServiceController@Orderstatus')->name('order.status');
Route::patch('/contactlist/{id}', 'ServiceController@ContactStatus')->name('contactlist.update');
Route::patch('/contactlist/update/{id}', 'ServiceController@ContactisCompleted')->name('contactlist.completed');
Route::patch('/services/order/update/{id}', 'ServiceController@OrderisCompleted')->name('order.completed');
Route::get('/services/create', 'ServiceController@create')->name('service.create');
Route::post('/services/create', 'ServiceController@store')->name('service.store');
Route::get('/services/edit/{id}', 'ServiceController@edit')->name('service.edit');
Route::post('/services/edit/{id}', 'ServiceController@update')->name('service.update');
});

// customers unauthenticated routes
Route::post('/service/order', 'CustomersOrderController@storeOrder')->name('pay-order');
Route::get('/services/pricing', 'CustomersOrderController@index')->name('pricing');
Route::get('/services/order/{Pricing}', 'CustomersOrderController@show')->name('order');
Route::get('/services/order/', 'CustomersOrderController@contact')->name('contact');
Route::post('/services/order/', 'CustomersOrderController@customOrder')->name('customorder');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:dashboardPermission')->group( function(){
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::get('/home', 'HomeController@index')->name('home');
});