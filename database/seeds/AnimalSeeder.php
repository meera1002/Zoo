<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_breed')->insert([
            'name' => 'Monkey',
            'average_health' => 30,
            'elapsed' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Giraffe',
            'average_health' => 50,
            'elapsed' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Elephant',
            'average_health' => 70,
            'elapsed' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
