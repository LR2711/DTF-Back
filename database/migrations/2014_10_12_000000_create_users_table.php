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
            $table->string('name', 100)->required();
            $table->string('email', 50)->unique()->required();
            $table->string('password', 270)->required(); 
            $table->float('weight', 5, 2)->required(); 
            $table->float('height', 5, 2)->required();
            $table->enum('planType', ['PlanType.GRATUITO', 'PlanType.PAGO'])->default('PlanType.GRATUITO');
            $table->enum('goal', ['Goal.MANTENERSE', 'Goal.BAJAR_PESO', 'Goal.AUMENTAR_MASA'])->required();
            $table->rememberToken();
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
