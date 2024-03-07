<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cargo extends Seeder
{

    public function run()
    {
        DB::table('cargo')->insert(['cargo'=>'GERENTE GENERAL']);
        DB::table('cargo')->insert(['cargo'=>'SUPERVISOR']);
        DB::table('cargo')->insert(['cargo'=>'CORDINADOR']);
        DB::table('cargo')->insert(['cargo'=>'ANALISTA']);
        DB::table('cargo')->insert(['cargo'=>'GERENTE NACIONALE']);
    }
}
