<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcerciseRoutine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercise_routine', function (Blueprint $table) {
            // $table->id();
            $table->integer('quantity');
            $table->integer('time');
            $table->enum('day', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);
            $table->text('comment')->nullable();
            $table->unsignedInteger('excercise_id');
            $table->foreign('excerciser_id')->references('id')->on('excercises');
            $table->unsignedInteger('routine_id');
            $table->foreign('routine_id')->references('id')->on('routines');
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
        Schema::dropIfExists('excercise_routine');
    }
}
