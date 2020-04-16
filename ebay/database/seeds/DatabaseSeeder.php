<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AdressSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(PayementSeeder::class);
        $this->call(PurchaseSeeder::class);
    }
}
