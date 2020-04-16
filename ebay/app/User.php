<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password','role'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   

    /**
    * @param string|array $role
    */

    public function authorizeRoles($roles)
    {
        if ($roles) {
            if (in_array($this->role, $roles)) {
            } else {
                return abort(401, 'This action is unauthorized.');
            }
        }      
    }

    public function payment_info()
    {
        return $this->hasMany('App\Payment_Info');
    }

    public function delivery_adress()
    {
        return $this->hasMany('App\Delivery_Address');
    }

    public function offer()
    {
        return $this->hasMany('App\Offer');
    }


}
