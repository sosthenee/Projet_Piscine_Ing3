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


Route::get('/items','ItemController@index');
 
Route::get('/items/create','ItemController@create');
 
Route::post('/items/action','ItemController@storeItem');

Route::get('/payment/{user_id}','PaymentController@readPaymentInfofromUser');

Route::get('/payment/{user_id}/{id}','PaymentController@readPaymentInfofromId');

//Route::get('/item', 'ItemController@get_all_images') ;

Route::get('/admin','AdminController@get_all_vendeurs');

Route::get('/admin/supp','AdminController@suppVendeur');

Route::post('/admin/action','AdminController@Suppression');