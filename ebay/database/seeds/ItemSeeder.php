<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;

class ItemSeeder extends Seeder
{

    public function run()
    {
        $user = User::where('role', 'seller')->first();

        $Item = new Item();
        $Item->Title = 'admin Name';
        $Item->Description = 'admin Name';
        $Item->Initial_price = '122';
        $Item->Category = bcrypt('secret');
        $Item->sell_type = 'admin';
        $Item->Start_date = '2020-04-08';
        $Item->End_date = '2020-04-08';
        $Item->sold = 1;
        $Item->user()->associate($user);
    
        $Item->save();
    }
}
