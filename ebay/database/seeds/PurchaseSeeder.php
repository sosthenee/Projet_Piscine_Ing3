<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Offer;
use App\Purchase;
use App\Delivery_address;

class PurchaseSeeder extends Seeder
{
    
    public function run()
    {
        $offer = Offer::get()->first();
        $address = Delivery_address::get()->first();
       
    
        $Purchase = new Purchase();
        $Purchase->transaction = '223';
        $Purchase->delivery_date = '2020-04-08';
        $Purchase->paiement_date = '2020-04-08';
        
        $Purchase->offer()->associate($offer);
        $Purchase->delivery_adress()->associate($address);
        
        $Purchase->save();
    }
}
