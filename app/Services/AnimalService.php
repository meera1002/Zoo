<?php

namespace App\Services;
use App\Models\Animal;
use App\Models\Breed;
use App\Helper\Common;

class AnimalService implements IAnimalService
{
    const REDUCE_HEALTH_MIN = 0;
    const REDUCE_HEALTH_MAX = 20;
    const INCREASE_HEALTH_MIN = 10;
    const INCREASE_HEALTH_MAX = 25;

    public function getAnimals(){
        $result = Animal::all();

        if(!empty($result)){
            foreach($result as $key=>$row){

                //$result[$key]->health_status = Common::healthStatus($row->current_health,$row->breed);
            }
        }
       return $result;
    }

    public function increase()
    {
        $breeds = Breed::all();

        foreach ($breeds as $breed) {
            $randomPercentage = Common::getRand(static::INCREASE_HEALTH_MIN, static::INCREASE_HEALTH_MAX);
            foreach ($breed->animals as $animal) {

                if ($animal->hasFullHealth()) {
                    continue;
                }

                $healthChangePercentage = $this->cpercentage($animal->current_health, $randomPercentage);
                $increasedHealth = $animal->current_health + $healthChangePercentage;
                $animal = Common::setAnimalStatus($animal,$increasedHealth);
                $previousHealth = $animal->current_health;
                $animal->previous_health = $previousHealth;
                $animal->current_health = $increasedHealth;
                if ($animal->hasFullHealth()) {
                    $animal->current_health = 100;
                }
                $animal->save();
            }
        }
    }
    public function decrease(){
        $breeds = Breed::all();

        foreach ($breeds as $breed) {
            $randomPercentage = Common::getRand(static::REDUCE_HEALTH_MIN, static::REDUCE_HEALTH_MAX);
            foreach ($breed->animals as $animal) {
                if ($animal->hasHealth()) {
                    continue;
                }

                $healthChangePercentage = $this->cpercentage($animal->current_health, $randomPercentage);
                $decresedHealth = $animal->current_health - $healthChangePercentage;
                $animal = Common::getAnimalStatus($animal,$decresedHealth);
                $previousHealth = $animal->current_health;
                $animal->previous_health = $previousHealth;
                $animal->current_health = $decresedHealth;
                $animal->save();

            }
        }
    }
    private function cpercentage($currentHealth, $percentage)
    {
        return ($currentHealth / 100) * $percentage;
    }


}
