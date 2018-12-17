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

// -------------------- Login ------------------------------------------
Route::group(['middleware' => 'guest'], function () {
Route::get('/admin/authentication/authentication_form','AuthController@authentication_form')->name('login.authentication_form');
Route::post('/admin/authentication/authenticate','AuthController@authenticate')->name('login.authenticate');
});
Route::get('/admin/authentication/logout','AuthController@logout')->name('user.logout')->middleware('auth');
// -------------------------dashboard Routes------------------------------- 
Route::group(['middleware' => 'auth'], function () {
Route::get('/', 'DashboardController@index')->name('home');
});

// -------------------------Room Routes------------------------------- 
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin/room/room', 'RoomController@room')->name('room.room');
Route::get('/admin/room/add_room', 'RoomController@add_room')->name('room.add_room');
Route::post('/admin/room/room', 'RoomController@store')->name('room.store');
Route::get('/admin/room/edit_room/{id}', 'RoomController@edit_room')->name('room.edit_room');
Route::put('/admin/room/update/{id}', 'RoomController@update_room')->name('room.update_room');
Route::get('/admin/room/remove/{id}', 'RoomController@remove_room')->name('room.remove_room');
 });

// -----------------------------Users-----------------------------------------
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'auth'], function () {
Route::get('/user/user','UserController@user')->name('user.user');
Route::get('/user/add_user','UserController@add_user')->name('user.add_user');
Route::post('/user/','UserController@store_user')->name('user.store_user');
Route::get('/user/edit_user/{user}','UserController@edit_user')->name('user.edit_user');
Route::get('/user/user_details/{user}','UserController@user_details')->name('user.user_details');
});

// -------------------------Renter Routes------------------------------- 
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin/renter/', 'RenterController@index')->name('renter');
Route::get('/admin/renter/create', 'RenterController@create')->name('renter.create');
Route::post('/admin/renter/store', 'RenterController@store')->name('renter.store');
Route::get('/admin/renter/show/{id}', 'RenterController@show')->name('renter.show');
Route::get('/admin/renter/edit/{id}', 'RenterController@edit')->name('renter.edit');
Route::put('/admin/renter/update/{id}', 'RenterController@update')->name('renter.update');
Route::post('/admin/renter/destroy/', 'RenterController@destroy')->name('renter.destroy');
 });


// -------------------------Allotment Routes------------------------------- 
Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'auth'], function () {
Route::get('/allotment/', 'AllotmentController@index')->name('allotment');
Route::get('/allotment/create', 'AllotmentController@create')->name('allotment.create');
Route::post('/allotment/isfull', 'AllotmentController@isFull')->name('allotment.isfull');
Route::post('/allotment/store', 'AllotmentController@store')->name('allotment.store');
Route::get('/allotment/show/{id}', 'AllotmentController@show')->name('allotment.show');
Route::get('/allotment/edit/{id}', 'AllotmentController@edit')->name('allotment.edit');
Route::put('/allotment/update/{id}', 'AllotmentController@update')->name('allotment.update');
Route::get('/allotment/destroy/{id}', 'AllotmentController@destroy')->name('allotment.destroy');
 });


// -------------------------Payment Routes------------------------------- 
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin/payment/', 'PaymentController@index')->name('payment');
Route::get('/admin/payment/create', 'PaymentController@create')->name('payment.create');
Route::post('/admin/payment/store', 'PaymentController@store')->name('payment.store');
Route::get('/admin/payment/show/{id}', 'PaymentController@show')->name('payment.show');
Route::get('/admin/payment/edit/{id}', 'PaymentController@edit')->name('payment.edit');
Route::put('/admin/payment/update/{id}', 'PaymentController@update')->name('payment.update');
Route::get('/admin/payment/destroy/{id}', 'PaymentController@destroy')->name('payment.destroy');
 });

// -------------------------Country Routes------------------------------- 
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin/country/', 'CountryController@index')->name('country');
Route::get('/admin/country/load_data', 'CountryController@load_data')->name('load_data');
Route::post('/admin/country/store', 'CountryController@store')->name('country.store');
Route::POST('/admin/country/update', 'CountryController@update')->name('country.update');
Route::POST('/admin/country/delete_country', 'CountryController@destroy')->name('country.delete_country');
 });

//------------------Dashboard Routes----------------------------------