<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionDeViaticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion__de__viaticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajadores');
            $table->string('identificador');
            $table->string('estatus');
            $table->string('trasladoConpernota')->nullable();
            $table->string('alojamientoConpernota')->nullable();
            $table->string('alimentacionConpernota')->nullable();
            $table->string('desdeConpernota')->nullable();
            $table->string('hastaConnpernota')->nullable();
            $table->string('trasladoSinpernota')->nullable();
            $table->string('alimentacionSinpernota')->nullable();
            $table->string('Chasta')->nullable();
            $table->string('Cdesde')->nullable();
            $table->string('Shasta')->nullable();
            $table->string('Sdesde')->nullable();
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
        Schema::dropIfExists('asignacion__de__viaticos');
    }
}
