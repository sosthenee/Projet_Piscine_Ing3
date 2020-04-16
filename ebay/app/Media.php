<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'type', 'reference'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
