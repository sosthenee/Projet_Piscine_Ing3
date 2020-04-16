<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'price', 'state', 'type'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function purchase()
    {
        return $this->hasOne('App\Purshase');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
