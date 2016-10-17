<?php

namespace App;
use App\User;
use App\Advertisements;
use App\Reviews;
use App\Events;
use App\Usr_Adv;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $table = 'contracts';

    protected $guarded = ['id']; // all fillable except id

    public function advertisements()
    {
        return $this->belongsTo('Advertisements');
    }

    public function phases()
    {
        return $this->belongsTo('Phases');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
