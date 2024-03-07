<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_presupuesto;
use DB;
use Hamcrest\Core\HasToString;

class model_traspaso extends Model
{
    protected $table = 'traspaso';
    protected $primaryKey = 'id';

 
    public static function unidad(){
        return $this->BelongsTo('App\model_unidad');
    }
    public static function traspaso_analista()
    {
        return $this->BelongsTo('App\traspaso_analista');
    }
    public static function ultimo_traspaso(){
        $id = DB::table('traspaso')->select('id','solicitud_traspaso')->orderby('id','desc')->first();
        return $id;
    }

    public static function partidas($id){
        //dd( DB::table('presupuesto')->select('id')->limit(10)->get());
        $partida = DB::table('presupuesto as pre')->select('pre.id','pre.id_clasificador_presupuestario','c_p.descripcion','c_p.codigo_partida')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->where('pre.id_unidad','=',session('id_unidad'))->where('pre.id_proyecto','=',$id)->where('pre.saldo_disponible','>','0')->get();
        //dd(session('id_unidad'),$partida);
        return $partida;

    }
    public static function monto_traspaso($id,$id2){
        //dd($id);
        $monto = DB::table('presupuesto as pre')->select('saldo_disponible')->where('id_unidad','=',session('id_unidad'))->where('pre.id','=',$id)->where('id_proyecto','=',$id2)->get();
        //dd($monto);
        return $monto;
    }
    public static function asignar_traspaso($data){
        dd($data->all());

    }
    public static function traspaso($traspaso){
        //dd($traspaso);
        $numero_s = DB::table('traspaso')->select('id')->where('id_unidad','=',session('id_unidad'))->get();
        //dd(count($numero_s));
        $siglas = DB::table('unidad')->select('siglas_cert')->where('id','=',session('id_unidad'))->get();
        //dd($siglas[0]->siglas_cert,date('Y'));
        $n_solicitud = str_pad(count($numero_s)+1, 5, "0", STR_PAD_LEFT).'-'.$siglas[0]->siglas_cert.'-'.date('Y');
        //dd($n_solicitud);
        $solicitud = new model_traspaso();
        $solicitud->solicitud_traspaso = $n_solicitud;
        $solicitud->concepto = $traspaso->concepto;
        $solicitud->id_unidad = session('id_unidad');
        $solicitud->estatus = 'Por Enviar';
        $solicitud->save();
        return true;
    }
    public static function actualizar_traspaso($request){
        $actualizar = model_traspaso::find($request->id_traspaso);
        $actualizar->memorandum_traspaso = $request->memorandum_traspaso;
        $actualizar->solicitud_credito_presupuestario = $request->solicitud_credito_presupuestario;
        $actualizar->estatus = 'Enviado';
        $actualizar->save();
        //dd($actualizar);
        return true;
    }

    public static function lista_traspaso(){
        $lista=DB::table('traspaso as tr')->select('tr.id','solicitud_traspaso','memorandum_traspaso','solicitud_credito_presupuestario','concepto','un.nombre','un.siglas_cert','estatus')->join('unidad as un','un.id','=','id_unidad')->where('estatus','=','Enviado')->get();
        //dd($lista);
        return $lista;
    }

    public static function lista_traspaso_unidad(){
        $lista=DB::table('traspaso as tr')->select('id','solicitud_traspaso','concepto','estatus')->where('tr.id_unidad','=',session('id_unidad'))->get();
        //dd($lista);
        return $lista;
    }

    public static function rechazar($data)//rechazar la transferencia presupuestaria
    {
        //dd($data->all());
        $reversar_traspaso = model_presupuesto::reversar_traspaso($data->id_traspaso);
        $rechazar = model_traspaso::find($data->id_traspaso);
        $rechazar->estatus = 'Rechazada';
        $rechazar->observacion = $data->observaciones;
        $rechazar->save();
        return true;
        //dd($rechazar);
    }

    public static function aceptar($request){// aceptar la transferencia presupuestaria

        //dd('llegue',$request->solicitud_credito_presupuestario);
        $aceptar_traspaso = model_presupuesto::aprobar_traspaso($request->id_traspaso);
        //dd()
        $traspaso = model_traspaso::find($request->id_traspaso);
        //dd($traspaso);
        $traspaso->solicitud_credito_presupuestario = $request->solicitud_credito_presupuestario;
        $traspaso->estatus = 'Aprobado';
        $traspaso->save();
        //dd('traspaso exitoso');
        return true; 
    }
    public static function  consultar_traspaso($data){
        $traspaso = DB::table('traspaso as tr')->select('tr.solicitud_traspaso','tr.id','tr.solicitud_traspaso','tr.id_unidad','tr.solicitud_credito_presupuestario')->where('tr.id','=',$data)->get();
        return $traspaso;
    }
}