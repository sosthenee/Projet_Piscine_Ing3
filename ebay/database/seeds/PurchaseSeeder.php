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
        $Purchase->delivery_date = '2020-05-18';
        $Purchase->paiement_date = '2020-04-08';
        
        $Purchase->offer()->associate($offer);
        $Purchase->delivery_adress()->associate($address);
        
        $Purchase->save();

        $Purchase2 = new Purchase();
        $Purchase2->delivery_date = '2020-02-24';
        $Purchase2->paiement_date = '2020-03-08';
        
        $Purchase2->offer()->associate($offer);
        $Purchase2->delivery_adress()->associate($address);
        
        $Purchase2->save();
    }
}
