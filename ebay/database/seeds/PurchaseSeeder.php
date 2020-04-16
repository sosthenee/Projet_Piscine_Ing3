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
        $Purchase->transaction = '3';
        $Purchase->delivery_date = '2020-04-08';
        $Purchase->paiement_date = '2020-04-08';
        
        $Purchase->offer()->associate($offer);
        $Purchase->delivery_adress()->associate($address);
        
        $Purchase->save();

        $Purchase2 = new Purchase();
        $Purchase2->transaction = '4';
        $Purchase2->delivery_date = '2020-04-08';
        $Purchase2->paiement_date = '2020-04-08';
        
        $Purchase2->offer()->associate($offer);
        $Purchase2->delivery_adress()->associate($address);
        
        $Purchase2->save();
    }
}
