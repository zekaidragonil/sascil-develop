<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_clasificador_presupuestario extends Model
{
    protected $table="calsificador_presupuestario";
    protected $prymaryKey = "id";

    public function presupuesto()
    {
        return $this->hasMany('App\model_presupuesto');
    }
    public function presupuesto_temporal(){
        return $this->hasMany('App\model_presupuesto_temporal');
    }
    public static function consulta_clasificador()// consulta del clasificador presupuestario
    {
        $clasificador=DB::table('clasificador_presupuestario')->select('id','codigo_partida','descripcion','agrupacion')->orderBy('codigo_partida')->get(); // consulta del clasificador prespuestario segun la onapre
        //dd($clasificador);
        return $clasificador;
    }

    public static function consulta_clasificador_desde($id){
        $clasificador = DB::table('presupuesto as pre')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('fondo as fn','fn.id','=','pro.id_fondo')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->select('id_clasificador_presupuestario','codigo_partida','descripcion','pro.id_fondo','fn.fondo')->where('pre.id_proyecto','=',$id)->orderBy('codigo_partida')->get();
        return $clasificador;
    }

    public static function consulta_clasificador_hasta($id,$clasf)// consulta del clasificador presupuestario
    {
        $clasificador= DB::table('presupuesto as pre')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->select('id_clasificador_presupuestario','codigo_partida','descripcion')->where('pre.id_proyecto','=',$id)->orderBy('codigo_partida')->where('id_clasificador_presupuestario','>',$clasf)->get(); // consulta del clasificador prespuestario segun la onapre
        //dd($clasificador);
        return $clasificador;
    }
    public static function id_clasificador($clasificador)
    {
        $n_clasificador = DB::table('clasificador_presupuestario')->select('id')->where ('codigo_partida','=',$clasificador)->distinct('codigo_partida')->get();
        return $n_clasificador;
    }
}
