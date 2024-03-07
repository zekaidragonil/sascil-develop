<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_modalidad_contratacion extends Model
{
    use HasFactory;
    protected $table = 'modalidad_contratacion';
    protected $primaryKey = 'id';

    public static function modalidad_contratacion(){
        $modalidad = DB::table('modalidad_contratacion')->select('id','modalidad','siglas')->get();
        //dd($modalidad);
        return $modalidad;
    }

    public static function consulta($id){
        $modalidad = DB::table('modalidad_contratacion')->select('siglas')->where('id','=',$id)->get();
        return $modalidad;
    }
}
