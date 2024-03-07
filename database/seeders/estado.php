<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estado extends Seeder
{
    public function run()
    {
        DB::table('estado')->insert(['estado'=>'Distrito Capital']);
        DB::table('estado')->insert(['estado'=>'Amazonas']);
        DB::table('estado')->insert(['estado'=>'Anzoátegui']);
        DB::table('estado')->insert(['estado'=>'Apure']);
        DB::table('estado')->insert(['estado'=>'Aragua']);
        DB::table('estado')->insert(['estado'=>'Barinas']);
        DB::table('estado')->insert(['estado'=>'Bolívar']);
        DB::table('estado')->insert(['estado'=>'Carabobo']);
        DB::table('estado')->insert(['estado'=>'Cojedes']);
        DB::table('estado')->insert(['estado'=>'Delta Amacuro']);
        DB::table('estado')->insert(['estado'=>'Falcón']);
        DB::table('estado')->insert(['estado'=>'Guárico']);
        DB::table('estado')->insert(['estado'=>'Lara']);
        DB::table('estado')->insert(['estado'=>'Mérida']);
        DB::table('estado')->insert(['estado'=>'Bolivariano de Miranda']);
        DB::table('estado')->insert(['estado'=>'Monagas']);
        DB::table('estado')->insert(['estado'=>'Nueva Esparta']);
        DB::table('estado')->insert(['estado'=>'Portuguesa']);
        DB::table('estado')->insert(['estado'=>'Sucre']);
        DB::table('estado')->insert(['estado'=>'Táchira']);
        DB::table('estado')->insert(['estado'=>'Trujillo']);
        DB::table('estado')->insert(['estado'=>'Yaracuy']);
        DB::table('estado')->insert(['estado'=>'Zulia']);
        DB::table('estado')->insert(['estado'=>'La Guaira']);
        DB::table('estado')->insert(['estado'=>'Dependencias Federales']);
    }
}
