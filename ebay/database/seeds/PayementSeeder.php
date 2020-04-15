<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Offer;
use App\Payment_info;

class PayementSeeder extends Seeder
{
   
    public function run()
    {
        $user = User::where('role', 'buyer')->first();
       
    
    $Payement = new Payment_info();
    $Payement->cardType = '223';
    $Payement->cardNumber = 'panier';
    $Payement->cardName = 'panier';
    $Payement->expirationDate = 'panier';
    $Payement->securityCode = 'panier';
    
    $Payement->user()->associate($user);
    
    $Payement->save();
    }
}
