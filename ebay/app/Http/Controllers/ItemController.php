<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;
use App\Media ;
use App\Offer ;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Storage;



class ItemController extends Controller
{
    public function testCron(){
        $datas=DB::table('items')
                    ->join('offers', 'offers.item_id','=', 'items.id')
                    ->join('purchases','purchases.offer_id', '=','offers.id')
                    ->where('items.sold',false)
                    ->where('offers.state','like', 'wait%')
                    
                    ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                            'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                            'purchases.id as purchase_id')
                    ->get();

        for($i=0; $i<count($datas);$i++)  
        {
            $data=$datas[$i];
            echo "<br>Nouvelle data en cours d'analyse: ";

            if($data->offer_type=='immediat')
            {
                echo "Cette achat est un achat immédiat. ";
                $test=DB::table('items')
                        ->join('offers', 'offers.item_id','=', 'items.id')
                        ->join('purchases','purchases.offer_id', '=','offers.id')
                        ->where('items.id','=',$data->item_id)
                        ->get();

                //on regarde toutes les offres proposé pour cette article si il n'y en a qu'une alors on l'attribut
                //si il y en a plusieurs c'est plus compliqué on fait rien ( best offer et achat immédiat etc)
                if(count($test)==1)
                {
                    echo "<strong>L'article va être attribué</strong> item id :$data->item_id offer id $data->offer_id ";
                    Item::find($data->item_id)->update([ 'sold' => true ]);
                    Offer::find($data->offer_id)->update(['state' => 'valid']);
                   //Send email
                }
                else{
                    echo "Probleme correspondance BDD : demande intervention d'un administrateur. ";
                }
            }
            if($data->offer_type=='bestoffer')
            {
                echo " Cette achat est une bestoffer. ";
                echo " Aucune action ne sera réalisé sur cette data. ";
            }
            if($data->offer_type=='bid')
            {
                echo "Cette achat est une enchère, nous allons update le prix initial de l'enchère en fonction de toutes les offres proposées pour cette enchère ";
                $test=DB::table('items')
                        ->join('offers', 'offers.item_id','=', 'items.id')
                        ->join('purchases','purchases.offer_id', '=','offers.id')
                        ->where('items.sold',false)
                        ->where('offers.state','like', 'wait%')
                        ->where('items.id','=',$data->item_id)
                        ->orderBy('offers.price','desc')
                        ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                            'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                            'purchases.id as purchase_id')
                        ->get();
                $j=0;
                foreach($test as $bb)
                {
                    
                    echo "$bb->offer_price";$j++;
                }
                if(count($test)>1)
                {
                    $new_price=($test[1]->offer_price)+1;

                    Item::find($test[0]->item_id)
                        ->update([ 'Initial_Price' => $new_price ]); 
                    
                    DB::table('offers')
                            ->where('price','<',$new_price)
                            ->update(['state' => 'refuse']);
                    echo "mise à jour des enchères réalisées le nouveau prix est $new_price";

                    //on réactualise nos données
                    $datas=DB::table('items')
                    ->join('offers', 'offers.item_id','=', 'items.id')
                    ->join('purchases','purchases.offer_id', '=','offers.id')
                    ->where('items.sold',false)
                    ->where('offers.state','like', 'wait%')
                    ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                            'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                            'purchases.id as purchase_id')
                    ->get();
                    $i=0;
                                        
                }else
                    echo "une seule offre proposée pour cet item, le prix initial reste inchangé";
                

                

            }
            

            

        }
        //return view('testCron',compact('datas'));
       
    }

    public function display_all(){
 
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')

                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();

        return view('item.items',compact('items'));
    }

    public function display_sell_type(){

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();

        $items_bid=$items->where('sell_type','enchere');
        
        $items_bestoffer = $items->where('sell_type','<>','enchere')
                    ->where('sell_type','<>','immediat');
                    
        $items_immediat = $items->where('sell_type','<>','enchere')
                    ->where('sell_type','<>','bestoffer ');
                    

        return view('item.items_sell_type',compact('items_bid','items_bestoffer','items_immediat'));
    }
    public function display_sell_type_search(){

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();
        
        if(request('2')==false)
            $items=$items->where('sell_type','<>','bestoffer ');

        if(request('1')==false)
            {$items=$items->where('sell_type','<>','enchere');}
        
        if(request('3')==false)
            $items=$items->where('sell_type','<>','immediat');

        if(request('3')==false&&request('2')==false)
            $items=$items->where('sell_type','<>','bestoffer immediat');

        if(request('a')==false)
            $items=$items->where('Category','<>','Bon pour le Musée');
        if(request('b')==false)
            $items=$items->where('Category','<>','Ferraille ou Trésor');
        if(request('c')==false)
            $items=$items->where('Category','<>','Accessoire VIP');

        
                            



        $items_bid=$items->where('sell_type','enchere');
                    
        $items_bestoffer = $items->where('sell_type','<>','enchere')
                                ->where('sell_type','<>','immediat');
                    
        $items_immediat = $items->where('sell_type','<>','enchere')
                            ->where('sell_type','<>','bestoffer ');

        if(request('min_price')<>"")
        {
            $items_bid=$items_bid->where('Initial_Price','>',request('min_price'));
            $items_immediat=$items_immediat->where('Initial_Price','>',request('min_price'));
        }
        if(request('max_price')<>"")
        {
            $items_bid=$items_bid->where('Initial_Price','<',request('max_price'));
            $items_immediat=$items_immediat->where('Initial_Price','<',request('max_price'));
        }

        return view('item.items_sell_type',compact('items_bid','items_bestoffer','items_immediat'));
    }
    public function display_category(){

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();

        $items_museum=$items->where('Category','Bon pour le Musée');
        
        $items_jewel = $items->where('Category','Ferraille ou Trésor');
                    
        $items_vip = $items->where('Category','Accessoire VIP');
                    

        return view('item.items_category',compact('items_museum','items_jewel','items_vip'));
    }
    public function display_category_search(){

        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();
        
        if(request('2')==false)
            $items=$items->where('sell_type','<>','bestoffer ');

        if(request('1')==false)
            {$items=$items->where('sell_type','<>','enchere');}
        
        if(request('3')==false)
            $items=$items->where('sell_type','<>','immediat');

        if(request('3')==false&&request('2')==false)
            $items=$items->where('sell_type','<>','bestoffer immediat');

        if(request('a')==false)
            $items=$items->where('Category','<>','Bon pour le Musée');
        if(request('b')==false)
            $items=$items->where('Category','<>','Ferraille ou Trésor');
        if(request('c')==false)
            $items=$items->where('Category','<>','Accessoire VIP');

        if(request('min_price')<>"")
        {
            $items=$items->where('Initial_Price','>',request('min_price'));
                    }
        if(request('max_price')<>"")
        {
            $items=$items->where('Initial_Price','<',request('max_price'));
            
        } 
                            



        $items_museum=$items->where('Category','Bon pour le Musée');
        
        $items_jewel = $items->where('Category','Ferraille ou Trésor');
                        
        $items_vip = $items->where('Category','Accessoire VIP');

        
        

        return view('item.items_category',compact('items_museum','items_jewel','items_vip'));
    }

    //Display of 1 item with options To buy it
    public function display(Request $request, $item_id){ 

        //$request->user()->authorizeRoles(['buyer','buyerseller']);
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
        
        $user = Auth::user();

        $item = new Item();

        $item->user_id=$user->id;
        $item->Title = request('Title');
        $item->Description = request('Description');
        $item->Category =request('Category');
        $item->admin_state="waiting";
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
   /*    public function display2($item_id){
        $offer=Offer::where('item_id', '=', $item_id)->get();
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('items.id',$item_id)
              ->select('items.title','items.Description','items.Category',
                            'media.type as media_type','media.reference as media_reference',
                            'offers.price','offers.id')
                    ->get();
        return view('offer.bestOffer',compact('items','offer'));
    }*/
 
}