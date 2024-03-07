<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ente extends Seeder
{

    public function run()
    {
        DB::table('ente')->insert(['nombre'=>'CORPOELEC','rif'=>'G-20020014-1','id_parroquia'=>'10115']);
        DB::table('ente')->insert(['nombre'=>'MINISTERIO DEL PODER POPULAR PARA LA ENERGÍA ELECTRICA','rif'=>'G-20008795-1','id_parroquia'=>'10115']);
    }
}
