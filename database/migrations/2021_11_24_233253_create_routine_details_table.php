<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_details', function (Blueprint $table) {
            $table->integer('quantity');
            $table->integer('time');
            $table->enum('day', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']);
            $table->text('comment')->nullable();
            $table->unsignedInteger('excercises_id');
            $table->foreign('excercises_id')->references('id')->on('excercises');
            $table->unsignedInteger('routines_id');
            $table->foreign('routines_id')->references('id')->on('routines');
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
        Schema::dropIfExists('routine_details');
    }
}
