<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            //PENDIENTE DEFINIR LA LONGITUD DE LOS STRING (VARCHAR)
            $table->increments('id');
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('email', 50)->unique();
            $table->string('pssword', 50);
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
        Schema::dropIfExists('trainers');
    }
}
