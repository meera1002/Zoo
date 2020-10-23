<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Breed extends Model
{
    protected $table = 'animal_breed';

    public function animals()
    {
        return $this->hasMany('App\Models\Animal', 'animal_breed_id', 'id');
    }

}