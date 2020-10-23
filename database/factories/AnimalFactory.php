<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Animal;
use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
