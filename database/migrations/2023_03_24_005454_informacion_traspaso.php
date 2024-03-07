<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacionTraspaso extends Migration
{

    public function up()
    {
        schema::create('informacion_traspaso',function(Blueprint $table){
            $table->increments('id');
            $table->string('numero_punto_cuenta',15);
            $table->integer('id_fuente');
            $table->string('moneda',15);
            $table->double('tasa');
            $table->double('monto');
            $table->double('monto_bs');
            $table->text('punto_cuenta');
            $table->text('lista_modificacion');
            $table->text('memorandum');
            $table->text('modificacion_presupuestaria');
            $table->integer('id_modificacion_presupuestaria');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('informacion_traspaso');
    }
}
