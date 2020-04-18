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

Route::get('/testCron','ItemController@testCron');


// ======= Purchase =======
Route::get('/achat','ItemController@display_all');
Route::get('/achat/SellType','ItemController@display_sell_type' );
Route::get('/achat/SellType/search','ItemController@display_sell_type_search' );
Route::get('/achat/Category','ItemController@display_category' );
Route::get('/achat/Category/search','ItemController@display_category_search' );

Route::get('/achat/{item_id}','ItemController@display');

Route::post('/achat/{item_id}/addBidOffer','OfferController@storeBid');
Route::post('/achat/{item_id}/addBestOffer','OfferController@storeBest');
Route::post('/achat/{item_id}/addImmediatOffer','OfferController@storeImmediat');

// ======= Selling =======
Route::get('/vendre/add','ItemController@create');
Route::post('/vendre/ajouter/action','ItemController@storeItem');

// ====== Affichage des items d'un vendeur pour un vendeur
Route::get('/vendre','ItemController@displayHomeSeller');


// ======= Offers =======
Route::get('/panier','OfferController@index');
Route::post('/panier/delete/{offer_id}','OfferController@destroy');
Route::post('/panier/update/{offer_id}','OfferController@update');
Route::post('/panier/delivery','OfferController@basketValidation'); //inutiles je crois

// ======= myAccount=======
Route::get('/myAccount',function(){return view('myAccount.myAccount');});

// ======= PAYMENTS =======
Route::get('/user/payments','PaymentController@AllfromUser');
Route::get('/payment/update_payment/{payment_id}', 'PaymentController@updateView');
Route::post('/payment/create','PaymentController@Create');
Route::delete('/payment/{payment_id}','PaymentController@delete');
Route::put('/payment/update/{payment_id}','PaymentController@update');

// ======= BEST OFFER =========
//Route::get('/bestoff/{item_id}','ItemController@display2');
Route::get('/mybestoff','OfferController@get_my_best_offersVendeurs');
Route::get('/mybestoff/{offer_id}','OfferController@propose_my_offersVendeurs');



// ======= COMMANDS =========

Route::post('/purshase','PurshaseController@buy');
Route::get('/purshase','PurshaseController@AllfromUser');

// ======= ADRESS =======
Route::get('/user/adress','DeliveryController@AllfromUser');
Route::get('/adress/update_adress/{adress_id}', 'DeliveryController@updateView');
Route::post('/adress/create','DeliveryController@Create');
Route::delete('/adress/{adress_id}','DeliveryController@delete');
Route::put('/adress/update/{adress_id}','DeliveryController@update');



//Route::get('/item', 'ItemController@get_all_images') ;
//  ======= ADMIN =======
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
