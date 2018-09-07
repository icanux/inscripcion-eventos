<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosUserTable extends Migration
{

    public function up()
    {
        Schema::create('eventos_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('eventos_id')->unsigned();
            $table->tinyInteger('certificado')->unsigned();
            $table->tinyInteger('asistencia')->unsigned();
            $table->tinyInteger('estado')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('eventos_id')->references('id')->on('eventos');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos_user');
    }
}
