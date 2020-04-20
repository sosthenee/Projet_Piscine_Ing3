<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $inject_firstName = "";
    protected $inject_street = "";
    protected $inject_city = "";
    protected $inject_date_dely = "";
    protected $inject_date = "";

    
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
