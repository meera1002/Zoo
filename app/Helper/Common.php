<?php
namespace App\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Common
{
    const HEALTH_STATUS_DEAD = 'Dead';
    const HEALTH_STATUS = 'Healthy';
    const WALKABLE_STATUS = 'Not Walkable';
    const CACHE = "TIME";
    public static function healthStatus( $currentStatus, $breed )
    {
        if ( $currentStatus < $breed->average_health ) {
            return self::HEALTH_STATUS_DEAD;
        }
        return self::HEALTH_STATUS;
    }
    public static function getRand( $start, $end )
    {
        return mt_rand( $start, $end );
    }
    public static function getAnimalStatus( $animal, $decresedHealth )
    {
        switch ( $animal->breed->name ) {
            case 'Elephant':
                if ( !$animal->hasIterated ) {
                    if ( $decresedHealth <= $animal->breed->average_health ) {
                        $animal->health_status = self::WALKABLE_STATUS;
                        $animal->hasIterated   = 1;
                    }
                } else {
                    if ( $decresedHealth <= $animal->breed->average_health ) {
                        $animal->health_status = self::HEALTH_STATUS_DEAD;
                    }
                }
                return $animal;
            default:
                if ( $decresedHealth <= $animal->breed->average_health ) {
                    $animal->health_status = self::HEALTH_STATUS_DEAD;
                }
                return $animal;
        }
    }
    public static function setAnimalStatus( $animal, $incresedHealth )
    {
        if ( $incresedHealth > $animal->breed->average_health ) {
            $animal->health_status = self::HEALTH_STATUS;
            if ( $animal->breed->name == 'Elephant' ) {
                $animal->hasIterated = 0;
            }
        }
        return $animal;
    }
    public static function getTime( )
    {
        return Carbon::now();
    }
    public static function zooTime( )
    {
        if ( Cache::has( static::CACHE ) ) {
            return Cache::get( static::CACHE );
        }
        return self::setDefaultTime();
    }
    private static function setDefaultTime( )
    {
        $defaultTime = self::getTime();
        Cache::forever( static::CACHE, $defaultTime );
        return $defaultTime;
    }
    public static function increaseZooTime( $hours = 1 )
    {

        Cache::forever( static::CACHE, self::zooTime()->addHours( $hours ) );

    }
    public static function forgetTime( )
    {
        Cache::forget(static::CACHE);
    }
}