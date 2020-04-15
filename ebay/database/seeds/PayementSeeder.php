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
    $Payement->cardType = 'maestro';
    $Payement->cardNumber = '23003049903094';
    $Payement->cardName = 'Mr buyer';
    $Payement->expirationDate = '2021-04-08';
    $Payement->securityCode = bcrypt('4563');
    
    $Payement->user()->associate($user);
    $Payement->save();

    $Payement2 = new Payment_info();
    $Payement2->cardType = 'mastercard';
    $Payement2->cardNumber = '293894847394';
    $Payement2->cardName = 'Mr buyer 2';
    $Payement2->expirationDate = '2023-04-08';
    $Payement2->securityCode = bcrypt('6483');
    
    $Payement2->user()->associate($user);
    $Payement2->save();
 
   }
}
