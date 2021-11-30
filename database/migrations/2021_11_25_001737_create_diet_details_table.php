<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_details', function (Blueprint $table) {
            $table->integer('quantity');
            $table->integer('time');
            $table->enum('day', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);
            $table->text('comment')->nullable();
            $table->unsignedInteger('meals_id');
            $table->foreign('meals_id')->references('id')->on('meals');
            $table->unsignedInteger('diets_id');
            $table->foreign('diets_id')->references('id')->on('diets');
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
        Schema::dropIfExists('diet_details');
    }
}
