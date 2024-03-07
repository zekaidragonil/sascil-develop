<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class perfil extends Seeder
{

    public function run()
    {
        DB::table('perfil')->insert(['nombre_perfil'=>'ADMINISTRADOR']);
        DB::table('perfil')->insert(['nombre_perfil'=>'GERENTE']);
        DB::table('perfil')->insert(['nombre_perfil'=>'USUARIO']);
        DB::table('perfil')->insert(['nombre_perfil'=>'ANALISTA']);
        DB::table('perfil')->insert(['nombre_perfil'=>'RECEPCION']);
        DB::table('perfil')->insert(['nombre_perfil'=>'SUPERVISOR']);
        DB::table('perfil')->insert(['nombre_perfil'=>'CONSULTOR']);
    }
}
