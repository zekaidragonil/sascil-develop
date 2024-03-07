<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_solicitud_has_analista extends Model
{
    use HasFactory;
    protected $table = 'solicitud_has_analista';

    public function usuario(){
        return $this->belongsTo('App\model_usuario');
    }
    public function solicitud(){
        return $this->belongsTo('App\model_solicitud');
    }
    public static function asignar($analista){
        //dd($analista->all());
        $consultar = DB::table('solicitud_has_analista')->select('id_solicitud')->where('id_solicitud','=',$analista->id_solicitud)->where('id_usuario','=',$analista->analista)->get();
        //dd($consultar);
        if(count($consultar)==0){
            $asignar = new model_solicitud_has_analista();
            $asignar->id_solicitud = $analista->id_solicitud;
            $asignar->id_usuario = $analista->analista;
            $asignar->fecha_asignado = date('Y-m-d h:m:s');
            $asignar->save();

            $solicitud = model_solicitud::find($analista->id_solicitud);
            $solicitud->estatus = 'Asignado';
            $solicitud->save();
            return true;
        }
        else
            return true;
    }
    public static function lista_consultor(){
        $lista=DB::table('solicitud as so')->select('so.id','numero_solicitud','numero_asignado','so.created_at as fecha_solicitud','s_a.fecha_asignado','fecha_respuesta','un.nombre','es.nombre_estatus','es.id as id_estatus')->join('solicitud_has_analista as s_a','s_a.id_solicitud','=','so.id')->join('usuario as us','us.id','=','s_a.id_usuario')->join('unidad as un','un.id','=','so.id_unidad')->join('proyecto as pro','pro.id','=','so.id_proyecto')->leftjoin('estatus as es','so.id_estatus','=','es.id')->whereNull('so.id_estatus')->orWhere('so.id_estatus','<','8')->where('so.id_estatus','!=','5')->where('s_a.id_usuario','=',session('id'))->get();
        //dd($lista);
        return $lista;
        //dd($lista,session('id'));
    }
    public static function consulta_lista_consultor(){
        $lista=DB::table('solicitud as so')->select('so.id','numero_solicitud','numero_asignado','so.created_at as fecha_solicitud','s_a.fecha_asignado','fecha_respuesta','un.nombre','es.nombre_estatus','es.id as id_estatus')->join('solicitud_has_analista as s_a','s_a.id_solicitud','=','so.id')->join('usuario as us','us.id','=','s_a.id_usuario')->join('unidad as un','un.id','=','so.id_unidad')->join('proyecto as pro','pro.id','=','so.id_proyecto')->leftjoin('estatus as es','so.id_estatus','=','es.id')->where('s_a.id_usuario','=',session('id'))->get();
        //dd($lista);
        return $lista;
    }
    public static function asignar_solicitud_adjudicada($data){
        //dd($data->all());
        $actualizar = DB::update('update solicitud_has_analista set verificado = 1 where id_solicitud = '.$data->id_solicitud);
        $asignado= new model_solicitud_has_analista();
        $asignado->id_solicitud = $data->id_solicitud;
        $asignado->id_usuario = $data->usuario;
        $asignado->fecha_asignado = now();
        $asignado->save();
        return true;
    }
}
