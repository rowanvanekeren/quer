<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usr_Adv extends Model
{
    protected $table = 'usr_adv';

    protected $guarded = ['id']; // all fillable except id

    public function advertisements()
    {
        return $this->belongsTo('Advertisements');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
