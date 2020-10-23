<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animal_breed_id');
            $table->string('name');
            $table->float('previous_health')->default(100);
            $table->float('current_health')->default(100);
            $table->integer('hasIterated')->default(0);
            $table->string('health_status')->default('Healthy');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
