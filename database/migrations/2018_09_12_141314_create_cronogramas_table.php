<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramasTable extends Migration
{
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->increments('id');

            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('area',100);
            $table->string('titulo',250);
            $table->string('encargado',250);
            $table->text('imagen');
            $table->tinyInteger('estado')->unsigned();
            $table->string('requisitos',150);
            $table->integer('eventos_id')->unsigned();
            $table->tinyInteger('tipo')->unsigned();

            $table->foreign('eventos_id')->references('id')->on('eventos');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cronogramas');
    }
}
