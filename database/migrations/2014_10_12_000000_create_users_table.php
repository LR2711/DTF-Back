<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 50)->unique();
            // $table->string('slug'); //PENDIENTE
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('pssword', 50);
            $table->float('weight', 5, 2); 
            $table->float('height', 5, 2);
            $table->enum('planType', ['Gratuito', 'Pago']);
            $table->enum('goal', ['Subir peso', 'Bajar peso', 'Aumento Masa Muscular']);
            // $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
