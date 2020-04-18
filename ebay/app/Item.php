<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'Title', 'Description', 'Initial_Price', 'Category', 'Start_date', 'End_date', 'Sell_type', 'sold','admin_state'
    ];
    
    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function offer()
    {
        return $this->hasMany('App\Offer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
