<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CertificacionPresupuestariaHasPresupuesto extends Migration
{

    public function up()
    {
        Schema::create('certificacion_presupuestaria_has_presupuesto',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_certificacion_presupuestaria')->references('id')->on('certificacion_presupuestaria')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_presupuesto')->references('id')->on('id')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_proyecto')->refereces('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_clasificador_presupuestario')->on('clasificador_presupuestario')->onDelete('cascade')->onUpdate('cascade');
            $table->double('pre_comprometido');
            $table->double('comprometido');
            $table->double('causado');
            $table->double('pagado');
            $table->double('monto');
            $table->double('saldo_disponible');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('certificacion_presupuestaria_has_presupuesto');
    }
}
