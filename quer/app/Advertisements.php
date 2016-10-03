<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    protected $table = 'advertisements';

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

    public function events()
    {
        return $this->belongsTo('Events');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
