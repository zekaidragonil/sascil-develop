<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_contratacion extends Seeder
{

    public function run()
    {
        DB::table('tipo_contratacion')->insert(['tipo_cont'=>'ADQUISICION DE BIENES','siglas'=>'AB']);
        DB::table('tipo_contratacion')->insert(['tipo_cont'=>'EJEUSIÓN DE OBRAS','siglas'=>'EO']);
        DB::table('tipo_contratacion')->insert(['tipo_cont'=>'PRESTACION DE SERVICIO','siglas'=>'PS']);
        DB::table('tipo_contratacion')->insert(['tipo_cont'=>'SERVICIOS PROFESIONALES','siglas'=>'SP']);
        DB::table('tipo_contratacion')->insert(['tipo_cont'=>'ENTES DEL ESTADO','siglas'=>'EE']);
    }
}
