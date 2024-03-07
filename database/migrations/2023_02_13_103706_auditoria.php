<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Auditoria extends Migration
{

    public function up()
    {
        Schema::create('auditoria',function(Blueprint $table){
            $table->increments('id');
            $table->text('actividad');
            $table->text('tabla');
            $table->text('campo');
            $table->text('valor_anterior');
            $table->text('valor_actual');
            $table->datetime('fecha');
            $table->string('usuario',80);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('auditoria');
    }
}
