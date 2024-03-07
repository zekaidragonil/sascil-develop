<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_tipo_contratacion extends Model
{
    use HasFactory;
    protected $table = 'tipo_contratacion';
    protected $primaryKey = 'id';

    public static function tipo_contratacion(){
        $consulta = DB::table('tipo_contratacion')->select('id','tipo_cont','siglas')->get();
        return $consulta;
    }

    public static function consulta($id){
        $consulta = DB::table('tipo_contratacion')->select('siglas')->where('id','=',$id)->get();
        return $consulta;
    }
}
