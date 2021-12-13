<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietMeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_meal', function (Blueprint $table) {
            // $table->id();
            $table->integer('quantity');
            $table->enum('day', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);
            $table->enum('kind_food', ['Desayuno', 'Almuerzo', 'Cena']);
            $table->text('comment')->nullable();
            $table->unsignedInteger('diet_id');
            $table->foreign('diet_id')->references('id')->on('diets');
            $table->unsignedInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('meals');
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
        Schema::dropIfExists('diet_meal');
    }
}
