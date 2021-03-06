<?php

namespace App;
use App\User;
use App\Advertisements;
use App\Reviews;
use App\Events;
use App\Contracts;
use App\Usr_Adv;
use Illuminate\Database\Eloquent\Model;

class Phases extends Model
{
    protected $table = 'phases';

    protected $guarded = ['id']; // all fillable except id

    public function contracts()
    {
        return $this->hasMany('App\Contracts', 'phase_id');
    }
}
