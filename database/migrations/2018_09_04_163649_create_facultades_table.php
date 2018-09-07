<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadesTable extends Migration
{
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre',250);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facultades');
    }
}
