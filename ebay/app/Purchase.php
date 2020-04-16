<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'transaction', 'delivery_date', 'paiement_date'
    ];

    public function delivery_adress()
    {
        return $this->belongsTo('App\Delivery_address');
    }

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
