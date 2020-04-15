<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;
use App\Media ;



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
 
    public function storeItem(Request $request){
 
        $item = new Item();
        $item->user_id=3;
        $item->Title = request('Title');
        $item->Description = request('Description');
        $item->Category =request('Category');

        $mySellType ="";
        if(request('myCheckBid')){
            $mySellType = "enchere";
            $item->initial_Price = request('price_min');
            $item->start_date= request('Start_date');
            $item->end_date= request('End_date');
        }else{
            if(request('myCheckBestOffer')){
                $mySellType = "bestoffer ";
            }
            if(request('myCheckImmediatPurchase')){
                $mySellType .= "immediat";
                $item->initial_Price = request('price');
            } 
        }
        $item->sell_Type = $mySellType;
        //$item->save();

        echo "test".$_FILES['fileUpload']['name'][0];
        //echo "test".$_FILES['fileUpload']['name'][1];
        //echo "test".$_FILES['fileUpload']['name'][2];
       // $_FILES['fileUpload']['name'][0]->isValid(['fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        if ($files = $_FILES['fileUpload']['name'][0]) {
            $destinationPath = 'media/item/'; // upload path
            $profileImage = date('YmdHis') . ".bmp";// . $files->getClientOriginalExtension();
            //$files->move($destinationPath, $profileImage);
            @copy($files,"$destinationPath" . "$profileImage");
            $insert['reference'] = "$destinationPath" . "$profileImage";
            $insert['item_id']=100;
            
            $check = Media::insertGetId($insert);
         }
         else
             echo "erreur";
        /* request('fileUpload')->isValid(['fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
       if ($files = $request->file('fileUpload')) {
           $destinationPath = 'media/item/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['reference'] = "$destinationPath" . "$profileImage";
           $insert['item_id']=100;
           
           $check = Media::insertGetId($insert);
        }
        else
            echo "erreur";
        
 */
        
 
        //return redirect('/items');
        
        //$media = new Media();
        //$media->reference = request('reference');
        //$item->media()->saveMany([$media]);
        //$media->save();
 
    }
 
}
