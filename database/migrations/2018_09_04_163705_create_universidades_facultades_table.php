<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversidadesFacultadesTable extends Migration
{

    public function up()
    {
        Schema::create('universidades_facultades', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('universidades_id')->unsigned();
            $table->integer('facultades_id')->unsigned();

            $table->foreign('universidades_id')->references('id')->on('universidades');
            $table->foreign('facultades_id')->references('id')->on('facultades');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('universidades_facultades');
    }
}
