<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usr_Adv extends Model
{
    protected $table = 'usr_adv';

    public function advertisements()
    {
        return $this->belongsTo('Advertisements');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
