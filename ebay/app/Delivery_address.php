<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_address extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'firstName', 'lastName', 'phoneNumber', 'number', 'street', 'city', 'postCode', 'country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function purchase()
    {
        return $this->hasMany('App\Purchase');
    }
}
