<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Item;
use App\Media;
use Illuminate\Support\Facades\Auth;
use App\Purchase;
use DateTime , DateInterval;
use App\User;

use Illuminate\Support\Facades\DB;

class PurshaseController extends Controller
{
    public function buy(Request $request){

        $now = new DateTime();
        $interval = new DateInterval('P6D');
        $user = Auth::user();
        $buys = Offer::where([['user_id',$user->id],
            ['state', 'panier']
        ])->get();
        
        Offer::where([['user_id',$user->id],
            ['state', 'panier']])->update(['state' => 'wait seller']);

        foreach($buys as $buy){
            $purshase = new Purchase();
            $purshase->paiement_date = date("Y-m-d").'T'.(date("H")+2).':'.date('i'); ;
            $purshase->delivery_date = $now->add($interval);;
            $purshase->state = '';
            $purshase->delivery_adress_id = request('choosenadress') ;
            $purshase->offer_id = $buy->id;
            $purshase->save();
        }

        return redirect()->action('PurshaseController@AllfromUser');  
    }


    public function AllfromUser(Request $request){

        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            $offers  = DB::table('offers')
                        ->join('items','offers.item_id', '=','items.id')
                        ->join('purchases','offers.id', '=','purchases.offer_id')
                        ->join('users','items.user_id', '=','users.id')
                        
                        ->where('offers.state','wait seller')
                        ->orWhere('offers.state','valid')
                        ->orWhere('offers.state','refuse')
                        ->where('offers.user_id',$user->id)
                        ->groupBy('offers.id')
                        ->select('offers.id', 'offers.item_id', 'offers.price', 'offers.state as state', 'offers.type as offer_type' , 'items.id as item_id',
                        'items.Title','items.Description', 'items.Category','items.start_date','items.end_date','items.Initial_Price', 'items.sell_type', 'items.sold', 
                        'users.id as seller_id', 'users.username as seller_username')
                        ->get();

            $purshases  = DB::table('purchases')
                            ->join('delivery_addresses','purchases.delivery_adress_id', '=','delivery_addresses.id')
                            ->join('users','delivery_addresses.user_id', '=','users.id')
                            ->join('offers','purchases.offer_id', '=','offers.id')
                            ->where('users.id',$user->id)
                            ->select('purchases.id','purchases.paiement_date','purchases.delivery_date','purchases.state',
                            'delivery_addresses.firstName as firstName', 'delivery_addresses.street', 'delivery_addresses.city', 'purchases.offer_id')
                            ->get();

            foreach ($offers as $offer) {
                $offer->inject_medias = Media::where('item_id',$offer->item_id)->first();
            
                foreach ($purshases as $purshase) {
                    if ($purshase->offer_id == $offer->id) {
                        $offer->inject_firstName = $purshase->firstName;
                        $offer->inject_street = $purshase->street;
                        $offer->inject_city = $purshase->city;
                        $offer->inject_date_dely = $purshase->delivery_date;
                        $offer->inject_date = $purshase->paiement_date;
                        //return var_dump($offer);
                    }
                }
            }
            //    return var_dump($purshases);
            //  return var_dump($offers);
            return view('purshase.purshase',compact('purshases', 'offers'));
        }
    }
}
