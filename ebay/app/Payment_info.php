<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_info extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'cardType', 'cardNumber', 'cardName', 'expirationDate', 'securityCode'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
