<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Item;

class ItemSeeder extends Seeder
{

    public function run()
    {
        
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Lot montre de Dali'; $Item->Description = 'Ces deux magnifiques horloges font parties de la collection de Dali. CÃ©lÃ¨bre par son tableau elles sont aujourd\'hui des Å“uvres de collection.';$Item->Initial_price = '899';$Item->Category = 'Bon pour le Musée';$Item->sell_type = 'bestoffer immediat';$Item->Start_date = '2020-04-17T11:00';$Item->End_date = '';$Item->sold =0; $Item->admin_state = 'waiting';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Voiture Dolorean'; $Item->Description = 'Magnifique voiture sorti d\'usine en 1983, avec 100 000 km.';$Item->Initial_price = '10000';$Item->Category = 'Accessoire VIP';$Item->sell_type = 'enchere';$Item->Start_date = '2020-04-17T11:01';$Item->End_date = '2020-04-19T23:59';$Item->sold =0; $Item->admin_state = 'waiting';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Statue Igor Mitoraj'; $Item->Description = 'Persée - Bronze signé et numéroté - Hauteur : 38 cm - Certificat';$Item->Initial_price = '1500';$Item->Category = 'Bon pour le Musée';$Item->sell_type = 'immediat';$Item->Start_date = '2020-04-17T11:02';$Item->End_date = '';$Item->sold =0; $Item->admin_state = 'waiting';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Lot pièce de monnaie'; $Item->Description = 'De la monnaie sacrée comme vous n\'en n\'avez jamais vu.';$Item->Category = 'Ferraille ou Trésor';$Item->sell_type = 'bestoffer ';$Item->Start_date = '2020-04-17T11:03';$Item->End_date = '';$Item->sold =0; $Item->admin_state = 'approve';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Montre Cartier'; $Item->Description = 'Magnifique montre cartier sans certificat. Ne pas l\'acheter serait dommage...';$Item->Initial_price = '10';$Item->Category = 'Ferraille ou Trésor';$Item->sell_type = 'enchere';$Item->Start_date = '2020-04-17T11:04';$Item->End_date = '2020-04-20T23:59';$Item->sold =0; $Item->admin_state = 'approve';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Lampes'; $Item->Description = 'Attention ça eclaire!';$Item->Initial_price = '120';$Item->Category = 'Accessoire VIP';$Item->sell_type = 'bestoffer immediat';$Item->Start_date = '2020-04-17T11:05';$Item->End_date = '';$Item->sold =0; $Item->admin_state = 'approve';$Item->save();
$Item = new Item(); $Item->user_id=3; $Item->Title = 'Bracelet en poils d\'éléphant'; $Item->Description = 'Deviens un aventurier grace a  ce bracelet. Il te fera ressentir les danger de la savane.';$Item->Initial_price = '80';$Item->Category = 'Ferraille ou Trésor';$Item->sell_type = 'immediat';$Item->Start_date = '2020-04-17T11:06';$Item->End_date = '';$Item->sold =0; $Item->admin_state = 'approve';$Item->save();


    }
}
