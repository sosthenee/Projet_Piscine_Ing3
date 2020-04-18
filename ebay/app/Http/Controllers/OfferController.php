<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item ;
use App\Offer ;
use App\Delivery_address ;
use App\Payment_info ;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $user = Auth::user();
        $offers  = DB::table('offers')
                    
                    ->join('items','offers.item_id', '=','items.id')
                    ->join('media','items.id', '=','media.item_id')
                    
                    ->join('users','items.user_id', '=','users.id')
                    ->where('offers.state','panier')
                    ->where('media.type','picture')
                    ->where('offers.user_id',$user->id)
                    ->orderBy('offers.item_id', 'desc')
                    ->select('offers.id', 'offers.item_id', 'offers.price', 'offers.state', 'offers.type as offer_type' ,
                    'media.type as media_type','media.reference as media_reference', 
                    'items.Title','items.Description', 'items.Category','items.start_date','items.end_date','items.Initial_Price', 'items.sell_type', 'items.sold', 
                    'users.id as seller_id', 'users.username as seller_username')
                    ->get();

    
        $delivery_addresses = Delivery_address::where('user_id',$user->id)->get();
        $payment_infos = Payment_info::where('user_id',$user->id)->get();
        return view('basket.offers',compact('offers','payment_infos','delivery_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBid(Request $request, $item_id)
    {
        $this->validate($request, [
            'price' => 'required',
        ]);


        $offer = new Offer();
        $offer->item_id=$item_id;
        $offer->price=request('price');
        $offer->state='panier';
        $offer->type="bid";
        $offer->user_id=2;
        $offer->save();
        
        return redirect('/achat')->with('success','L\'élèment a été ajouté à votre panier !');

    }
    public function storeBest(Request $request, $item_id)
    {
        $this->validate($request, [
            'price' => 'required',
        ]);

        $offer = new Offer();
        $offer->type="bestoffer";
        $offer->item_id=$item_id;
        $offer->price=request('price');
        $offer->state='panier';
        $offer->user_id=2;
        $offer->save();

        return redirect('/achat')->with('success','L\'élèment a été ajouté à votre panier !');

    }
    public function storeImmediat(Request $request, $item_id)
    {   
        $items  = DB::table('items')
                    ->where('items.id',$item_id)
                    ->get();

        if(count($items)==1)
        {
            $item=$items[0];

            $offer = new Offer();
            $offer->type="immediat";
            $offer->item_id=$item_id;
            $offer->price=$item->Initial_Price;
            $offer->state='panier';
            $offer->user_id=2;
            $offer->save();

            return redirect('/achat')->with('success','L\'élèment a été ajouté à votre panier !');

        }
        else
        {
            echo "problem BDD: multiple items with this id";
            return redirect('/achat')->with('error','L\'élèment n\'a pas été ajouté à votre panier !');
        }
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        return redirect('/panier')->with('error','Aucune modification n\'a été faite. La page de modification n\'existe pas encore');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offers  = DB::table('offers')
                    ->where('offers.id',$id)
                    ->get();

        if(count($offers)==1&&$offers[0]->state=="panier")
        {
            Offer::where('id', '=', $id)->delete(); 
            return redirect('/panier')->with('success','Vous venez de retirer une offre de votre panier');
        }
        else{
            return redirect('/panier')->with('error','Cet element ne peut pas être supprimer' .count($offers));
        }
        
    }
    public function basketValidation()
    {

        return redirect('/panier')->with('error','La page de validation du panier n\'existe pas encore');
    }
}
