<?php

use Illuminate\Database\Seeder;
use App\Delivery_Address;
use App\User;
class AdressSeeder extends Seeder
{
    
    public function run()
    {
    
        $user = User::where('role', 'seller')->first();

    
    $adress = new Delivery_Address();
    $adress->firstName = 'admin Name';
    $adress->firstName = 'admin Name';
    $adress->lastName = 'admin@example.com';
    $adress->phoneNumber = bcrypt('secret');
    $adress->number = 'admin';
    $adress->street = 'admin';
    $adress->city = 'admin';
    $adress->postCode = 'admin';
    $adress->country = 'admin';
    $adress->user()->associate($user);
    
    $adress->save();
    }
}
