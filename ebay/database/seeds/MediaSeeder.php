<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;
use App\Media;

class MediaSeeder extends Seeder
{
    
    public function run()
    {
        $item = Item::get()->first();

    
        $media = new Media();
        $media->type = 'photo';
        $media->reference = '';
        $media->item()->associate($item);

        $media->save();
    }
}
