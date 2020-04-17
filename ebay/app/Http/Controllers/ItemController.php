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
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->get();

        return view('item.items',compact('items'));
    }
    public function display($item_id){

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('items.id',$item_id)
                    ->get();
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
        $item->admin_state="approve";
        $item->sold=0;

        $item->start_date=date ("c");


        $mySellType ="";
        if(request('myCheckBid')){
            $mySellType = "enchere";
            $item->initial_Price = request('price_min');
            $item->start_date= request('start_date');
            $item->end_date= request('end_date');
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
        if($mySellType!=="")
        {
            $item->save();

            $files=$request->file('file');
            if(!empty($files)){
                $i=0;
                foreach($files as $file){
                    $path=date('YmdHis') . $i."." . $file->getClientOriginalExtension();
                    if(strpos(".ogm .wmv .mpg .webm .ogv .asx .mpeg .mp4 .mkv .avi", $file->getClientOriginalExtension())!== false)
                        $insert['type']="video";
                    else
                        $insert['type']="picture";
                    $insert['reference'] = $path;
                    $insert['item_id']=$item->id;
                    $check = Media::insertGetId($insert);
                    Storage::put("public/".$path,file_get_contents($file));
                    $i++;
                }
            }
            else
            { 
                $insert['type']="picture";
                $insert['reference'] = "unnamed.png";
                $insert['item_id']=$item->id;
                $check = Media::insertGetId($insert);
            }
    
            return redirect('/vendre')->with('success','Votre item a été ajouté !');
        }
        else
            return redirect('/vendre')->with('error','Votre item n\'a été ajouté ! Merci de bien saisir le champ "type de vente" ');
        
        
        //$media = new Media();
        //$media->reference = request('reference');
        //$item->media()->saveMany([$media]);
        //$media->save();
 
    }
 
}