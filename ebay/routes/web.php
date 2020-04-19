<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () { return view('welcome');});

Auth::routes();


Route::get('/home', 'ItemController@display_all')->name('home');



//Route::get('/admin', 'HomeController@admin_only');

Route::get('/','ItemController@display_all');

// ======= Purchase =======
Route::get('/achat','ItemController@display_all');
Route::get('/achat/SellType','ItemController@display_sell_type' );
Route::get('/achat/SellType/search','ItemController@display_sell_type_search' );
Route::get('/achat/Category','ItemController@display_category' );
Route::get('/achat/Category/search','ItemController@display_category_search' );
Route::get('/achat/Seller/{seller_id}','ItemController@display_seller_items');


// Display details of an item (only for buyer)
Route::get('/achat/{item_id}','ItemController@display');
// Make an offer for an item (only for buyer)
Route::post('/achat/{item_id}/addBidOffer','OfferController@storeBid');
Route::post('/achat/{item_id}/addBestOffer','OfferController@storeBestFirst');
Route::post('/achat/{item_id}/addImmediatOffer','OfferController@storeImmediat');

// ============== Selling ===============
Route::get('/vendre/add','ItemController@create'); //display view of creation an item
Route::post('/vendre/ajouter/action','ItemController@storeItem'); //creation an item


// ====== Affichage des items d'un vendeur pour un vendeur===
Route::get('/vendre','ItemController@displayHomeSeller'); 
Route::put('/vendre/update/{item_id}','ItemController@update');
Route::get('/vendre/update_vendre/{item_id}', 'ItemController@updateView');



// =============== Offers =================
Route::get('/panier','OfferController@index'); //display basket
Route::post('/panier/delete/{offer_id}','OfferController@destroy');
Route::post('/panier/update/{offer_id}','OfferController@update');
Route::post('/panier/delivery','OfferController@basketValidation'); // !!!! inutiles je crois !!! 

// ======= myAccount=======
Route::get('/myAccount','UserController@my_account');
Route::get('/myAccount/myInfos','UserController@index');
Route::get('/myAccount/myInfos/edit','UserController@edit_myinfos');
Route::post('/myInfos/modification','UserController@modif_myinfos');


// ============ PAYMENTS ==========
Route::get('/user/payments','PaymentController@AllfromUser');//display list of payment of the conneceted user
Route::get('/payment/update_payment/{payment_id}', 'PaymentController@updateView');
Route::post('/payment/create','PaymentController@Create');
Route::delete('/payment/{payment_id}','PaymentController@delete');
Route::put('/payment/update/{payment_id}','PaymentController@update');

// ======= BEST OFFER =========
//Route::get('/bestoff/{item_id}','ItemController@display2');
Route::get('/mybestoffV','OfferController@get_my_best_offersVendeurs');
Route::post('/mybestoffV/{id}','OfferController@propose_my_offersVendeurs');

Route::get('/mybestoffA','OfferController@get_my_best_offersAcheteurs');
Route::post('/mybestoffA/{id}','OfferController@propose_my_offersAcheteurs');

Route::post('/mybestoff/{id}','OfferController@storeBest');
Route::post('/myAccount/{id}','OfferController@saveOffer');
Route::post('/mybestoff/{id}/refuse','OfferController@refuseOffer');

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


//  ======= Logout =======
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
