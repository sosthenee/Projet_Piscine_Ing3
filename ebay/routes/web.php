<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'HomeController@admin_only');

// ======= ITEMS =======
Route::get('/items','ItemController@index');
 
Route::get('/items/create','ItemController@create');
 
Route::post('/items/action','ItemController@storeItem');

// ======= PAYMENTS =======
Route::get('/user/{user_id}/payments','PaymentController@AllfromUser');
Route::get('/payment/update_payment/{payment_id}', 'PaymentController@updateView');
Route::post('/payment/create','PaymentController@Create');
Route::delete('/payment/{payment_id}','PaymentController@delete');
Route::put('/payment/update/{payment_id}','PaymentController@update');


// ======= USER =========



// ======= ADRESS =======
Route::get('/user/{user_id}/adress','DeliveryController@AllfromUser');
Route::get('/adress/update_adress/{adress_id}', 'DeliveryController@updateView');
Route::post('/adress/create','DeliveryController@Create');
Route::delete('/adress/{adress_id}','DeliveryController@delete');
Route::put('/adress/update/{adress_id}','DeliveryController@update');



//Route::get('/item', 'ItemController@get_all_images') ;

Route::get('/admin','AdminController@get_all_vendeurs');

Route::get('/admin/supp','AdminController@suppVendeur');

Route::post('/admin/action','AdminController@Suppression');