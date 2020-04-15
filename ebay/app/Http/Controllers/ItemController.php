<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;
use App\Media ;
use Illuminate\Support\Facades\DB;
use Storage;


class ItemController extends Controller
{
    public function get_all_images()
    {
       
    }
   
    public function index(){
 
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->get();
            
        //$items = Item::all();
        return view('item.item',compact('items'));
    }
 
    public function create(){

        return view('item.createItem');
    }
 
    public function storeItem(Request $request){
 
        $this->validate($request, [
            'Title' => 'required',
            'Description' => 'required',
            'Category' => 'required',
            'Title' => 'required',
        ]);

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
        $item->save();


        $files=$request->file('file');
        if(!empty($files)){
            $i=0;
            foreach($files as $file){
                $path=date('YmdHis') . $i."." . $file->getClientOriginalExtension();
                Storage::put("public/".$path,file_get_contents($file));
                
                $insert['reference'] = $path;
                $insert['type']="picture";
                $insert['item_id']=$item->id;
                
                $check = Media::insertGetId($insert);
                $i++;
            }
        }
        else
            echo "no files";  
 
        return redirect('/items')->with('success','Votre item a été ajouté !');
        
        //$media = new Media();
        //$media->reference = request('reference');
        //$item->media()->saveMany([$media]);
        //$media->save();
 
    }
 
}

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->get();
            
        //$items = Item::all();
    public function storeItem(Request $request){
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
        $item->save();

        $files=$request->file('file');
        if(!empty($files)){
            $i=0;
            foreach($files as $file){
                $path=date('YmdHis') . $i."." . $file->getClientOriginalExtension();
                Storage::put("public/".$path,file_get_contents($file));
                
                $insert['reference'] = $path;
                $insert['type']="picture";
                $insert['item_id']=$item->id;
                
                $check = Media::insertGetId($insert);
                $i++;
            }
        }
        else
            echo "no files";  
        return redirect('/items')->with('success','Votre item a été ajouté !');
        
        //$media = new Media();
        //$media->reference = request('reference');
        //$item->media()->saveMany([$media]);
        //$media->save();
 