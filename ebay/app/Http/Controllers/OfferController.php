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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
