<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;
use App\Media ;



class ItemController extends Controller
{
    public function get_all_images()
    {
	$items = Item::all();
    $title = "";
    $txt2 = "<br>";
	foreach ($items as $item) {
    	$title = $title.$item->Title.$txt2;
	};
 	
 	return $title.$txt2 ;
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
        $item->save();


        $media = new Media();
        $media->reference = request('reference');
       
        $item->media()->saveMany([$media]);

        $media->save();

        return redirect('/items');
 
    }
 
}
