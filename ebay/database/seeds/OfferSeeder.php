<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;
use App\Offer;

class OfferSeeder extends Seeder
{
    
    public function run()
    {
        $user = User::where('role', 'buyer')->first();
        $item = Item::get()->first();

        
        $offer = new Offer();
        $offer->price = 223;
        $offer->state = 'panier';
        $offer->type = 'no';
        $offer->user()->associate($user);
        $offer->item()->associate($item);
        
        $offer->save();


        $offer2 = new Offer();
        $offer2->price = 223;
        $offer2->state = 'wait buyer';
         $offer2->type = 'no';

        $offer2->user()->associate($user);
        $offer2->item()->associate($item);
        
        $offer2->save();
    
    }
}
