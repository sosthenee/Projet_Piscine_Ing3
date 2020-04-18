<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
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
            ['state', 'panier']])->update(['state' => 'waitsseller']);

        foreach($buys as $buy){
            $purshase = new Purchase();
            $purshase->paiement_date = $now ;
            $purshase->delivery_date = $now->add($interval);;
            $purshase->state = '';
            $purshase->delivery_adress_id = request('choosenadress') ;
            $purshase->offer_id = $buy->id;
            $purshase->save();
        }
                    
       
        return redirect()->action('PurshaseController@AllfromUser');  
    }


    public function AllfromUser(Request $request){

        $user = Auth::user();
        $purshases  = DB::table('purchases')
        ->join('delivery_addresses','purchases.delivery_adress_id', '=','delivery_addresses.id')
        ->join('users','delivery_addresses.user_id', '=','users.id')
        ->join('offers','purchases.offer_id', '=','offers.id')
        ->where('users.id',$user->id)
        ->select('purchases.id','purchases.paiement_date','purchases.delivery_date','purchases.state')
        ->get();



        return view('purshase.purshase',compact('purshases'));

    }
}
