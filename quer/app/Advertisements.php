<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Contracts;
use App\Reviews;
use App\Events;
use App\Usr_Adv;

class Advertisements extends Model
{
    protected $table = 'advertisements';

    protected $guarded = ['id']; // all fillable except id

    public function contracts()
    {
        return $this->hasMany(Contracts::class, 'advertisement_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'advertisement_id');
    }

    public function usr_adv()
    {
        return $this->hasMany(Usr_Adv::class, 'advertisement_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Events');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
