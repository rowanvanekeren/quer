<?php

namespace App;
use App\User;
use App\Contracts;
use App\Reviews;
use App\Events;
use App\Usr_Adv;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $guarded = ['id']; // all fillable except id

    public function events()
    {
        return $this->hasMany(Events::class, 'categorie_id');
    }
}
