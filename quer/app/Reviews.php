<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    public function advertisements()
    {
        return $this->belongsTo('Advertisements');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
