<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
 
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre',300);
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('direccion',300);
            $table->text('imagen');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
