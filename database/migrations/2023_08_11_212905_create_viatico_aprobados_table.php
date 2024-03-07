<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaticoAprobadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viatico_aprobados', function (Blueprint $table) {
         $table->id();
        $table->string('identificadorSeleccionado');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('ci');
        $table->string('cuenta_bancaria');
        $table->string('referencia_bancaria');
        $table->string('carnet');
        $table->string('cedula_copias');
        $table->enum('estatus', ['Conpernota', 'Sinpernota']);
        $table->integer('traslado')->nullable();
        $table->integer('alojamiento')->nullable();
        $table->integer('alimentacion')->nullable();
        $table->integer('dias')->nullable();
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viatico_aprobados');
    }
}
