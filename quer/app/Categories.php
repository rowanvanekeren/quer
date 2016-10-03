<?php

namespace App;

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
