<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item ;
use App\Media ;
use App\Offer ;
use App\User ;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Storage;



class ItemController extends Controller
{
    
    /******************************************************************************
     * ***********************           PUBLIC          **************************
     * **************************************************************************** */
    public function display_all(){
 
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->orderBy('items.id', 'desc')
                    ->where('items.Start_date','<',$today)
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();

        return view('item.items',compact('items'));
    }

    public function display_seller_items($seller_id){
 
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->where('items.user_id',$seller_id)
                    ->orderBy('items.id', 'desc')
                    ->where('items.Start_date','<',$today)
                    ->where('items.admin_state','approve')
                    ->where('items.sold',false)
                    ->get();
        $mySeller=DB::table('users')
                    ->where('users.id',$seller_id)
                    ->get()->first();

        return view('item.items_seller',compact('items', 'mySeller'));
    }

    public function display_sell_type(){
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->where('items.Start_date','<',$today)
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
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->where('items.Start_date','<',$today)
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
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->where('items.Start_date','<',$today)
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
        $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
        $items  = DB::table('items')
                    ->join('media','items.id', '=','media.item_id')
                    ->join('users','items.user_id', '=','users.id')
                    ->where('media.type','picture')
                    ->where('items.Start_date','<',$today)
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
            $items=$items->where('Initial_Price','>',request('min_price'));  
        if(request('max_price')<>"")
            $items=$items->where('Initial_Price','<',request('max_price'));
        


        $items_museum=$items->where('Category','Bon pour le Musée');
        
        $items_jewel = $items->where('Category','Ferraille ou Trésor');
                        
        $items_vip = $items->where('Category','Accessoire VIP');

        return view('item.items_category',compact('items_museum','items_jewel','items_vip'));
    }

    /*************************************************************************
     *                         POUR L'ACHETEUR
     *************************************************************************/
    //Display of 1 item with options To buy it
    public function display(Request $request, $item_id){ 
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='buyer'&&$user->role!=='buyerseller')
            {
                return redirect('/')->with('error','Vous n\'etes pas acheteur. Identifiez vous ou faites une création de compte !');
            }else{
                $request->user()->authorizeRoles(['buyer','buyerseller']);
                $items  = DB::table('items')
                            ->join('media','items.id', '=','media.item_id')
                            ->join('users','items.user_id', '=','users.id')
                            ->where('items.id',$item_id)
                            ->get();
                return view('item.item',compact('items'));
            }
        }
        
        
    }
 
    /************************************************************************
     * *******************     POUR LE VENDEUR         **********************
     * ********************************************************************** */

    public function displayHomeSeller(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='seller'&&$user->role!=='buyerseller'&&$user->role!=='admin')
            {
                return redirect('/')->with('error','Vous n\'etes pas vendeur. Identifiez vous ou faites une création de compte !');
            }else{

                $items  = DB::table('items')
                            ->join('media','items.id', '=','media.item_id')
                            ->where('media.type','picture')
                            ->where('items.user_id',$user->id)
                            ->orderBy('items.id', 'desc')               
                            ->get();

                return view('item.sellerHome',compact('items'));
            }}
    }
    //get
    public function updateView(Request $request, $item_id){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='seller'&&$user->role!=='buyerseller'&&$user->role!=='admin')
            {
                return redirect('/')->with('error','Vous n\'etes pas vendeur. Identifiez vous ou faites une création de compte !');
            }else{
                $item_infos = Item::where('id',$item_id)->first();

                $items  = DB::table('items')
                ->join('media','items.id', '=','media.item_id')
                ->where('media.type','picture')
                ->where('items.user_id',$user->id)
                ->where('items.id',$item_id)
                ->orderBy('items.id', 'desc')               
                ->get();
                return view('item.changeSellerHome',compact('item_infos','items'));
            }
        }
    }
    //post
    public function update(Request $request, $item_id ){
      
        $user_id = Auth::id();
        $items = Item::where('id',$item_id)->first();
        $items->Title = request('title');
        $items->Description = request('description');
        $items->save();
        
        foreach($items->media()->get() as $media)
        {
            if ( null != request("d".$media->id)){
                if($items->media()->get()->count()== 1){
                    $media->reference = "unnamed.png";
                    $media->save();
                } else {
                    $media->delete();
                }
            }
        }

        $files=$request->file('files');
        if(!empty($files)){
            $i=0;
            foreach($files as $file){
                $path=date('YmdHis') . $i."." . $file->getClientOriginalExtension();
                if(strpos(".ogm .wmv .mpg .webm .ogv .asx .mpeg .mp4 .mkv .avi", $file->getClientOriginalExtension())!== false)
                    $insert['type']="video";
                else
                    $insert['type']="picture";
                $insert['reference'] = $path;
                $insert['item_id']=$item_id;
                $check = Media::insertGetId($insert);
                Storage::put("public/".$path,file_get_contents($file));
                $i++;
            }
            echo "$i images ajoutées";
        }
        else
            echo "pas d'images";

        return redirect()->action('ItemController@displayHomeSeller');
    }

    public function create(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='seller'&&$user->role!=='buyerseller'&&$user->role!=='admin')
            {
                return redirect('/')->with('error','Vous n\'etes pas vendeur. Identifiez vous ou faites une création de compte !');
            }else{
                return view('item.createItem');
            }
        }
    }
    
    //function POST
    public function storeItem(Request $request){
 
        $user = Auth::user();
        $this->validate($request, [
            'Title' => 'required',
            'Description' => 'required',
            'Category' => 'required',
            'Title' => 'required',
        ]);

        $item = new Item();

        $item->user_id=$user->id;
        $item->Title = request('Title');
        $item->Description = request('Description');
        $item->Category =request('Category');
        $item->admin_state="waiting";
        $item->sold=0;
        $item->start_date= request('start_date');

        $mySellType ="";
        if(request('myCheckBid')){
            $mySellType = "enchere";
            $item->initial_Price = request('price_min');
            
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

        //$item->media()->saveMany([$media]);
    }
}