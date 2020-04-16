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


//Route::get('/admin', 'HomeController@admin_only');


Route::get('/items','ItemController@index');
 
Route::get('/items/create','ItemController@create');
 
Route::post('/items/action','ItemController@storeItem');

Route::get('/payment/{user_id}','PaymentController@readPaymentInfofromUser');

Route::get('/payment/{user_id}/{id}','PaymentController@readPaymentInfofromId');

//Route::get('/item', 'ItemController@get_all_images') ;

Route::get('/ListesVendeurs','AdminController@get_all_vendeurs');

Route::get('/ListesVendeurs/suppVendeur','AdminController@suppVendeur');

Route::post('/ListesVendeurs/action','AdminController@suppressionVendeur');

Route::get('/VendeursAttente','AdminController@vendeurEnAttente');

Route::post('/VendeursAttente/approuver/{user_id}','AdminController@VendeurchoixAjouter');


Route::post('/VendeursAttente/refuser/{user_id}','AdminController@VendeurchoixRefuser');

Route::get('/ListesItems','AdminController@get_all_items');

Route::get('/ListesItems/suppItem','AdminController@suppItem');

Route::post('/ListesItems/action','AdminController@suppressionItem');

Route::get('/ItemsAttente','AdminController@ItemsenAttente');

Route::post('/ItemsAttente/approuver/{item_id}','AdminController@ItemschoixAjouter');


Route::post('/ItemsAttente/refuser/{item_id}','AdminController@ItemschoixRefuser');
