<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;
use App\Media;

class MediaSeeder extends Seeder
{
    
    public function run()
    {
        

        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162250450.jpg';  $media->item_id=1;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162250451.jpg';  $media->item_id=1;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162306560.jpg';  $media->item_id=2;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162306561.png';  $media->item_id=2;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162306562.jpg';  $media->item_id=2;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162314020.jpg';  $media->item_id=3;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162315390.jpg';  $media->item_id=4;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162315391.jpg';  $media->item_id=4;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162320160.png';  $media->item_id=5;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162320161.png';  $media->item_id=5;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162321580.jpg';  $media->item_id=6;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  '202004162321581.jpg';  $media->item_id=6;  $media->save();
        $media = new Media();  $media->type = 'picture';  $media->reference =  'unnamed.png';  $media->item_id=7;  $media->save();

    }
}
