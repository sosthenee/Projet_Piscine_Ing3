<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'item_id';
    
    protected $fillable = [
        'Title', 'Descritption', 'Initial price', 'Category', 'Start time', 'End date', 'Sell type', 'Sold'
    ];
    
}
