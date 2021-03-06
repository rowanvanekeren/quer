<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Advertisements;
use App\Reviews;
use App\Events;
use App\Usr_Adv;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','image','email','last_name','username','country','city','street', 'postal_code','house_number','phone_number', 'is_admin', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function advertisements()
    {
        return $this->hasMany(Advertisements::class, 'user_id');
    }

    public function contracts_quer()
    {
        return $this->hasMany(Contracts::class, 'quer_id');
    }

    public function contracts_applicant()
    {
        return $this->hasMany(Contracts::class, 'applicant_id');
    }

    public function reviews_quer()
    {
        return $this->hasMany(Reviews::class, 'quer_id');
    }

    public function reviews_applicant()
    {
        return $this->hasMany(Reviews::class, 'applicant_id');
    }

    public function usr_adv()
    {
        return $this->hasMany(Usr_Adv::class, 'user_id');
    }

}
