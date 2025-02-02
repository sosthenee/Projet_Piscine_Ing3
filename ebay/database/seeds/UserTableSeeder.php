<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    
    $admin = new User();
    $admin->firstname = 'admin Name';
    $admin->email = 'admin@example.com';
    $admin->password = bcrypt('secret');
    $admin->role = 'admin';
    $admin->username = 'admin userName';
    $admin->lastname = 'admin lastName';
    $admin->email_verified_at = '2020-04-17';
    $admin->pseudo = 'ece_admin';
    $admin->profil_picture = '';
    $admin->contract = 1;
    $admin->save();

    $buyer = new User();
    $buyer->firstname = 'buyer Name';
    $buyer->email = 'buyer@example.com';
    $buyer->password = bcrypt('secret');
    $buyer->role ='buyer';
    $buyer->username = 'buyer userName';
    $buyer->lastname = 'buyer lastName';
    $buyer->email_verified_at = '2020-04-19';
    $buyer->pseudo = 'ece_buyer';
    $buyer->profil_picture = '';
    $buyer->contract = 1;
    $buyer->save();

    $seller = new User();
    $seller->firstname = 'seller Name';
    $seller->email = 'seller@example.com';
    $seller->password = bcrypt('secret');
    $seller->role= 'seller';
    $seller->username = 'seller userName';
    $seller->lastname = 'seller lastName';
    $seller->email_verified_at = '2020-04-37';
    $seller->pseudo = 'ece_seller';
    $seller->profil_picture = 'unnamed.png';
    $seller->background_picture = 'unnamed.png';

    $seller->contract = 0;
    $seller->save();
      
    $both = new User();
    $both->firstname = 'buyerseller Name';
    $both->email = 'buyerseller@example.com';
    $both->password = bcrypt('secret');
    $both->role= 'buyerseller';
    $both->username = 'buyerseller userName';
    $both->lastname = 'buyerseller lastName';
    $both->email_verified_at = '2020-04-37';
    $both->pseudo = 'ece_seller';
    $both->profil_picture = 'unnamed.png';
    $both->background_picture = 'unnamed.png';

    $both->contract = 1;
    $both->save();
  }
}