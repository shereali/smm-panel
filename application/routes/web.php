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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin'],function(){
Route::get('admin', 'MainController@index')->name('admin');
Route::get('admin/view-service', 'MainController@view_service')->name('view-service');
Route::resource('admin/services', 'ServiceController');

Route::get('admin/category', 'MainController@category')->name('category');
Route::post('admin/add_category', 'MainController@add_category');
Route::post('admin/edit_category', 'MainController@edit_category');
Route::post('admin/update_category', 'MainController@update_category');
Route::post('admin/delete_category', 'MainController@delete_category');
Route::get('admin/order', 'MainController@order')->name('order');
Route::post('admin/updateOrderStatus/{order_id}', 'MainController@updateOrderStatus');
});

Route::get('dashboard','MainController@dashboard')->name('dashboard');
Route::get('payment-gateway','MainController@payment_gateway')->name('payment-gateway');
//---------------------------
// route for view/blade file
//---------------------------
Route::get('paypal-payment','PaymentController@paypal_payment')->name('paypal-payment');

//-------------------------
// route for post request
//-------------------------
Route::post('paypal', 'PaymentController@postPaymentWithpaypal')->name('paypal');

//---------------------------------
// route for check status responce
//---------------------------------
Route::get('paypal','PaymentController@getPaymentStatus')->name('status');

Route::post('storeFacebookData', 'ManageOrderController@storeFacebookData')->name('facebook-post');
Route::post('storeTwitterData', 'ManageOrderController@storeTwitterData')->name('twitter-post');
Route::post('storeYoutubeData', 'ManageOrderController@storeYoutubeData')->name('youtube-post');
Route::post('storeInstagramData', 'ManageOrderController@storeInstagramData')->name('instagram-post');

