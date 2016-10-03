<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function events()
    {
        return $this->hasMany(Events::class, 'categorie_id');
    }
}
