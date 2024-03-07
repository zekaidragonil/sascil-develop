<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class model_modificacion_presupuestaria extends Model
{
    protected $table='modificacion_presupuestaria';
    protected $prymaryKey='id';

    public static function proyecto(){
        return $this->belogsTo('App\model_proyecto');
    }
    public static function fondo(){
        return $this->belogsTo('App\model_fondo');
    }
    public static function calsificador_presupuestario(){
        return $this->belogsTo('App\model_clasificador_presupuestario');
    }

    public static function modificacion_analista(){
        return $this->HasMany('App\model_modificacion_presupuestaria');
    }

    public static function informacion_traspaso(){
        return $this->belongsTo('App\model_modificacion_presupuestaria');
    }

    public static function agregar_modificacion_presupuestaria($data){
        //dd(doubleval(str_replace(',','.',str_replace('.','',$data->monto_bs))),$data->all());
        $agregar = new model_modificacion_presupuestaria();
        $agregar->id_unidad = session('id_unidad');
        $agregar->monto_asignar_divisa = doubleval(str_replace(',','.',str_replace('.','',$data->monto_divisa)));
        $agregar->monto_asignar_bs = doubleval(str_replace(',','.',str_replace('.','',$data->monto_bs)));
        $agregar->punto_cuenta = $data->numero_punto;
        $agregar->estatus = 'En Transito';
        $agregar->punto_cuenta_adjudicacion = $data->punto_cuenta_adjudicacion;
        $agregar->lista_modificacion = $data->lista_modificacion;
        $agregar->memorandum_modificacion = $data->memorandum_modificacion;
        $agregar->id_proyecto = $data->id_proyecto;
        $agregar->id_fondo = $data->id_fondo;
        $agregar->id_moneda = $data->id_moneda;
        $agregar->tasa =doubleval(str_replace(',','.',str_replace('.','',$data->tasa)));
        // $agregar->estatus = 'En Transito';
        $agregar->save();
        //dd('agregue');
        return true;
    }
    public static function consultar($data){
        //dd($data->all());
        $aux = DB::table('modificacion_presupuestaria')->select('id')->where('id_presupuesto','=',$data->presupuesto)->get();
        if(count($aux)==0)
            return false;
        else{
            $consultar = model_modificacion_presupuestaria::find($aux[0]->id);
            if($consultar->estatus=='En Transito'){
                return 'solicitud en proceso';
            }else{
                return true;
            }
        }
    }
    public static function lista_presupuestaria(){//debes mostrar la de las tablas temporaes y la de las tablas modificadas

        $consulta = DB::table('modificacion_presupuestaria as m_p')->select('m_p.id','m.tipo_moneda','f.fondo','punto_cuenta','punto_cuenta_adjudicacion','monto_asignar_divisa','monto_asignar_bs','pro.proyecto_presupuestario','pro.nombre_proyecto','estatus')->join('fondo as f','f.id','=','m_p.id_fondo')->join('moneda as m','m.id','=','m_p.id_moneda')->join('proyecto as pro','pro.id','=','m_p.id_proyecto')->where('m_p.id_unidad','=',session('id_unidad'))-> get();
        //dd($consulta[0]);
        return $consulta;
    }
}
