<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventosUserTable extends Migration
{

    public function up()
    {
        Schema::table('eventos_user',function(Blueprint $table){
            $table->integer('cronogramas_id');

            $table->foreign('cronogramas_id')->references('id')->on('cronogramas');

        });
    }

    public function down()
    {
        //
    }
}
