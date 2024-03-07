<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class denominacion_proyecto extends Seeder
{

    public function run()
    {
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'ACTUALIZAR LA PLATAFORMA TECNOLOGIA DE CORPOELEC','proyecto_presupuestario'=>'P0094']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'ADECUAR INFRAESTRUCTURA DE GENERACIÓN','proyecto_presupuestario'=>'P0069']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'ADECUAR INFRAESTRUCTURA DE TRANSMISIÓN Y DISTRIBUCIÓN A NIVEL NACIONAL','proyecto_presupuestario'=>'P0092']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'ADECUAR LA INFRAESTRUCTURA DE TRANSMISIÓN DE ENERGÍA ELÉCTRICA','proyecto_presupuestario'=>'P0071']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'ADECUAR LA RED DE DISTRIBUCIÓN DE ENERGÍA ELÉCTRICA','proyecto_presupuestario'=>'P0021']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'CENTRAL HIDROELÉCTRICA TOCOMA','proyecto_presupuestario'=>'P0036']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'CONSOLIDAR LOS SISTEMAS DE TRANSMISIÓN  Y REDES  DE DISTRIBUCIÓN A NIVEL NACIONAL','proyecto_presupuestario'=>'P0091']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'CONSTRUCCIÓN DE SUBESTACIONES ENCAPSULADA EN SF6 EN LA ZONA URBANA DE MARACAIBO','proyecto_presupuestario'=>'P0044']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'DIRECCIÓN Y COORDINACIÓN DE LOS GASTOS DE LOS TRABAJADORES','proyecto_presupuestario'=>'AC001']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'EXPANSIÓN  DE LA CAPACIDAD DE TRANSFORMACIÓN DEL SISTEMA ELÉCTRICO NACIONAL','proyecto_presupuestario'=>'P0078']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'EXPANSIÓN DE LOS VALLES DEL TUY','proyecto_presupuestario'=>'P0064']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'GESTIÓN ADMINISTRATIVA','proyecto_presupuestario'=>'AC002']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'IMPLEMENTACIÓN DE SISTEMA DE RESPALDO A LAS ESTACIONES DE TELECOMUNICACIONES DEL SISTEMA ELÉCTRICO NACIONAL (SEN) CON FUENTES ALTERNAS DE ENERGÍA ','proyecto_presupuestario'=>'P0070']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'IMPLEMENTAR PLAN ESPECIAL DEL SISTEMA ELÉCTRICO DE DISTRIBUCIÓN GUAICAIPURO','proyecto_presupuestario'=>'P0083']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'MANETENIMIENTO ALAS PLANTAS DE GENERACIÓN DE ENERGIS ELECTRICA','proyecto_presupuestario'=>'P0089']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'MEJORAR LA CALIDAD DE LA ENERGÍA SUMINISTRADA A LOS USUARIOS','proyecto_presupuestario'=>'P0075']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'MODERNIZACIÓN DE LOS SISTEMAS DE SUPERVISIÓN Y CONTROL DEL SISTEMA ELÉCTRICO NACIONAL (SEN) Y SUBSISTEMAS ASOCIADOS.','proyecto_presupuestario'=>'P0093']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'MODERNIZACIÓN DEL SISTEMA A 765 KV','proyecto_presupuestario'=>'P0077']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'MODERNIZAR LA RED DE ALUMBRADO PÚBLICO','proyecto_presupuestario'=>'P0082']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'OBRAS NUEVAS TERMOZULIA II','proyecto_presupuestario'=>'P0063']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'PLANTA  TERMOZULIA III','proyecto_presupuestario'=>'P0037']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'PREVISIÓN Y PROTECCIÓN SOCIAL','proyecto_presupuestario'=>'AC003']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'PROGRAMA PARA LA RECUPERACIÓN Y ESTABILIZACIÓN DEL SISTEMA ELÉCTRICO NACIONAL','proyecto_presupuestario'=>'P0090']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'REHABILITACION DE INFRAESTRUCTURA DE GENERACION HIDROELECTRICA','proyecto_presupuestario'=>'P0009']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'REHABILITACION DE LA INFRAESTRUCTURA DE GENERACION HIDROELECTRICA','proyecto_presupuestario'=>'']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'REHABILITACION DE LA INFRAESTRUCTURA DE GENERACION TERMOELECTRICA','proyecto_presupuestario'=>'P0010']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'REHABILITAR LAS UNIDADES 1 A 6 DE LA CASA DE MÁQUINAS 1 DE LA CENTRAL HIDROELÉCTRICA SIMÓN BOLÍVAR (GURI)','proyecto_presupuestario'=>'P0038']);
        DB::table('denominacion_proyecto')->insert(['nombre_proyecto'=>'SUMINISTRAR E INSTALAR CABLE SUBLACUSTRE A 400 KV EN EL LAGO DE MARACAIBO ','proyecto_presupuestario'=>'P0065']);
    }
}
