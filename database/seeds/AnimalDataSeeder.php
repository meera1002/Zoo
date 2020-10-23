<?php

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Animal::class, 5)->create([
            'animal_breed_id' => 1,
        ]);
        factory(Animal::class, 5)->create([
            'animal_breed_id' => 2,
        ]);
        factory(Animal::class, 5)->create([
            'animal_breed_id' => 3,
        ]);
    }
}
