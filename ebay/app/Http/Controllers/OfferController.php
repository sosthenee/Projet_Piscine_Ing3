<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item ;
use App\Offer ;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers  = DB::table('offers')
                    
                    ->join('items','offers.item_id', '=','items.id')
                    ->join('media','items.id', '=','media.item_id')
                    
                    ->join('users','items.user_id', '=','users.id')
                    ->where('offers.state','panier')
                    ->where('media.type','picture')
                    ->orderBy('offers.item_id', 'desc')
                    ->select('offers.id', 'offers.item_id', 'offers.price', 'offers.state', 'media.type','media.reference', 'items.Title','items.Description', 'items.Category','items.end_date', 'items.sell_type', 'items.sold', 'users.id as sellerId', 'users.username')
                    ->get();

        return view('basket.offers',compact('offers'));
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
        
        return redirect('/panier')->with('error','Aucune modification n\'a été fait la page de modification n\'existe pas encore');
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
            return redirect('/panier')->with('success','Vous vener de retirer une offre de votre panier');
        }
        else{
            return redirect('/panier')->with('error','Cet element ne peut pas être supprimer' .count($offers));
        }
        
    }
    public function basketValidation(Request $request)
    {
        return redirect('/achat')->with('error','La page de validation du panier n\'existe pas encore');
    }
}
