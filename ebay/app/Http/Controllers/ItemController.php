<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;

class ItemController extends Controller
{
    public function get_all_images()
    {
       
    }
   
    public function index(){
 
        $items = Item::all();
        return view('item.item',compact('items'));
    }
 
    public function create(){

        return view('item.createItem');
    }
 
    public function storeItem(){
 
        $item = new Item();
        $item->Title = request('Title');
        $item->Description = request('Description');
        $item->Category =request('Category');

        $mySellType ="";
        if(request('myCheckBid')){
            $mySellType = "enchere";
            $item->Price = request('price_min');
           // $item->Start_date= request('Start_date');
           // $item->End_date= request('End_date');
        }else{
            if(request('myCheckBestOffer')){
                $mySellType = "bestoffer ";
            }
            if(request('myCheckImmediatPurchase')){
                $mySellType .= "immediat";
                $item->Price = request('price');
            } 
        }
        $item->Sell_Type = $mySellType;

       
        $item->save();
 
        return redirect('/items/create');
 
    }
 
}
