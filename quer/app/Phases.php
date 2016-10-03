<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phases extends Model
{
    protected $table = 'phases';

    protected $guarded = ['id']; // all fillable except id

    public function contracts()
    {
        return $this->hasMany(Contracts::class, 'phase_id');
    }
}
