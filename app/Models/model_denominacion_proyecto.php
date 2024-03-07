<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_denominacion_proyecto extends Model
{
    use HasFactory;
    protected $table = 'denominacion_proyecto';
    protected $primarykey = 'id';

    public static function denominacion_p(){
        $proy=DB::table('denominacion_proyecto')->select('proyecto_presupuestario')->get();
        return $proy;
    }

    public static function n_proyecto($id){
        $nombre=DB::table('denominacion_proyecto')->select('nombre_proyecto')->where('proyecto_presupuestario','=',$id)->get();
        return $nombre[0]->nombre_proyecto;
    }
}
