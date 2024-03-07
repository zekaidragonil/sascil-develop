<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Solicitud extends Migration
{

    public function up()
    {
        schema::create('solicitud',function(Blueprint $table){
            $table->increments('id');
            $table->string('numero_punto_cuenta',45);
            $table->integer('correlativo_unidad');
            $table->string('estatus',100);
            $table->text('certificacion_presupuestaria');
            $table->text('espesificaciones_tecnicas');
            $table->text('forma_018');
            $table->text('matriz_tecnica');
            $table->text('memorandum');
            $table->text('bienes_nacionales');
            $table->text('opinion_ashox');
            $table->text('observaciones');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_tipo_contratacion')->references('id')->on('tipo_contratacion')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_modalidad_contratacion')->references('id')->on('modalidad_contratacion')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_certificacion_presupuestaria')->references('id')->on('certificacion_presupuestaria')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_estatus')->references('id')->on('estatus')->onDelete('cascade')->onUpdate('cascade');
            $table->text('contrato_firmado');
            $table->text('pedido_creado');
            $table->text('punto_estatus');
            $table->date('fecha_punto_estatus');
            $table->text('numero_punto_cuenta_estatus');
            $table->text('numero_control_punto_estatus');
            $table->text('punto_cuenta');
            $table->date('fecha_punto');
            $table->string('numero_control',60);
            $table->text('estimacion_costo');
            $table->text('descripcion');
            $table->string('numero_asignado',50);
            $table->string('numero_solicitado',50);
            $table->datetime('fecha_recepcion');
            $table->datetime('fecha_numeracion');
            $table->string('fianza_buena_calidad',2);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('solicitud_has_analista');
    }
}
