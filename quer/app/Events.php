<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $guarded = ['id']; // all fillable except id

    public function categories()
    {
        return $this->belongsTo('Categories');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisements::class, 'event_id');
    }
}
