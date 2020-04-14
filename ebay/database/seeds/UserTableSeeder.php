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
    $admin->save();

    $buyer = new User();
    $buyer->firstname = 'buyer Name';
    $buyer->email = 'buyer@example.com';
    $buyer->password = bcrypt('secret');
    $buyer->role ='buyer';
    $buyer->save();

    $seller = new User();
    $seller->firstname = 'seller Name';
    $seller->email = 'seller@example.com';
    $seller->password = bcrypt('secret');
    $seller->role= 'seller';
    $seller->save();
  }
}