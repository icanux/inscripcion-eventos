<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users',function(Blueprint $table){
            $table->tinyInteger('tipo')->unsigned();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono_fijo',20)->nullable();
            $table->string('telefono_movil',20)->nullable();
            $table->string('direccion',250)->nullable();
            $table->tinyInteger('estado')->unsigned();
        });
    }

    public function down()
    {
        //
    }
}
