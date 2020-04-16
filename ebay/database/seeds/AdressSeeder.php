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
    $adress->firstName = 'seller';
    $adress->firstName = 'de lamotte';
    $adress->lastName = 'sosthene@delam.com';
    $adress->phoneNumber = '064534567';
    $adress->number = '27';
    $adress->street = 'avenue lazare';
    $adress->city = 'chaville';
    $adress->postCode = '92370';
    $adress->country = 'france';
    $adress->user()->associate($user);
    
    $adress->save();

    $adress2 = new Delivery_Address();
    $adress2->firstName = 'willy';
    $adress2->firstName = 'bouhnik';
    $adress2->lastName = 'willy@bouhnik.com';
    $adress2->phoneNumber = '06434557';
    $adress2->number = '45';
    $adress2->street = 'avenue louveois';
    $adress2->city = 'Paris';
    $adress2->postCode = '75015';
    $adress2->country = 'france';
    $adress2->user()->associate($user);
    
    $adress2->save();
    }
}
