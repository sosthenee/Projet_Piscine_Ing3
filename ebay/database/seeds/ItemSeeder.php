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
        $Item->Title = 'Bijoux';
        $Item->Description = '14 carat très precieux';
        $Item->Initial_price = '122';
        $Item->Category = 'VIP';
        $Item->sell_type = 'enchere';
        $Item->Start_date = '2020-04-08';
        $Item->End_date = '2020-04-08';
        $Item->sold = 1;
        $Item->admin_state = 'aprouved';

        $Item2 = new Item();
        $Item2->Title = 'Biblo';
        $Item2->Description = 'valeur sentimentale';
        $Item2->Initial_price = '144';
        $Item2->Category = 'MUSEE';
        $Item2->sell_type = 'imefiat';
        $Item2->Start_date = '1998-04-08';
        $Item2->End_date = '2021-04-08';
        $Item2->sold = 1;
        $Item2->admin_state = 'aprouved';
        $Item2->user()->associate($user);
    
        $Item2->save();

        $Item3 = new Item();
        $Item3->Title = 'echelle';
        $Item3->Description = 'tres grande';
        $Item3->Initial_price = '30';
        $Item3->Category = 'MUSEE';
        $Item3->sell_type = 'offre';
        $Item3->Start_date = '1998-04-08';
        $Item3->End_date = '2021-04-08';
        $Item3->sold = 1;
        $Item3->admin_state = 'aprouved';
        $Item3->user()->associate($user);
    
        $Item3->save();
    }
}
