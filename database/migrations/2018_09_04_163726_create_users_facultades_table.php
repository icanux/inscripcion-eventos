<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFacultadesTable extends Migration
{
    
    public function up()
    {
        Schema::create('users_facultades', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('universidades_facultades_id')->unsigned();
            $table->tinyInteger('vigente')->unsigned();
            $table->tinyInteger('ciclo')->unsigned();
            $table->string('seccion')->nullable();
            $table->tinyInteger('estado')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('universidades_facultades_id')->references('id')->on('universidades_facultades');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_facultades');
    }
}
