<?php

namespace App;
use App\User;
use App\Advertisements;
use App\Events;
use App\Usr_Adv;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $guarded = ['id']; // all fillable except id

    public function advertisements()
    {
        return $this->belongsTo('Advertisements');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
