<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breed;

class Animal extends Model
{
    const HEALTH_UPPER_LIMIT = 100;
    const HEALTH_LOWER_LIMIT = 0;
    public function breed( )
    {
        return $this->hasOne( 'App\Models\Breed', 'id', 'animal_breed_id' );
    }
    public function hasFullHealth( )
    {
        if ( $this->current_health >= static::HEALTH_UPPER_LIMIT || $this->health_status == 'Dead' ) {
            return true;
        }
        return false;
    }
    public function hasHealth( )
    {
        if ( $this->current_health <= static::HEALTH_LOWER_LIMIT || $this->health_status == 'Dead' ) {
            return true;
        }
        return false;
    }
}