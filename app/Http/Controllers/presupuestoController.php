<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_presupuesto;
use App\Models\model_fondo;
use App\Models\model_clasificador_presupuestario;
use App\Models\model_ente;
use App\Models\model_fuente_financiamiento;
use App\Models\model_modificacion_presupuestaria;
use App\Models\model_proyecto;
use App\Models\model_presupuesto_temporal;
use App\Models\model_moneda;
use App\Models\model_unidad;
use Illuminate\Database\Eloquent\Model;

class presupuestoController extends Controller
{

    public function lista_llave_presupuestaria(Request $request)
    {
        if(session('id')){
            //dd($request->all());
            $llave_presupuestaria = model_presupuesto::llave_presupuestaria($request->id_proyecto);
            $proyecto = model_proyecto::nombre_proyecto($request->id_proyecto);
            //dd($proyecto[0]);
            $presupuesto_modificado= model_presupuesto_temporal::lista_presupuesto($proyecto[0]->id);   
            //dd($presupuesto_modificado);     
            if(count($llave_presupuestaria)==0){
                $llave_presupuestaria = false;
            }
            $presupuesto_modificado = model_presupuesto_temporal::lista_presupuesto($proyecto[0]->id);
            //dd($presupuesto_modificado);
            $fondo = model_fondo::fondo();
            $clasificador_presupuestario = model_clasificador_presupuestario::consulta_clasificador();
            //dd($clasificador_presupuestario);
            $divisa = model_moneda::divisa();
            return view('usuario.lista_presupuestaria',compact('presupuesto_modificado','llave_presupuestaria','fondo','clasificador_presupuestario','proyecto','divisa'));
        }else
            return view('notf.notf34');
    }

    public function consulta_modificacion_presupuestaria(Request $id){
        $consulta = model_presupuesto_temporal::consulta_temporal($id->id);
        return $consulta;
    }


    public function agregar_partida(Request $request)
    {
        if(session('id')){
            $aux=model_presupuesto::verificar($request);
            //dd(count($aux));
            if(count($aux)==0){
                $consultar = model_presupuesto_temporal::consultar($request);
                //dd($consultar);
                if(count($consultar)==0){
                    //dd($request->all());
                    $punto=$request->file('punto_cuenta_adjudicacion');
                    $ext=strstr($request->file('punto_cuenta_adjudicacion')->getClientOriginalName(),".",false);
                    $nombre_solicitud="punto_cuenta_modificacion".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
                    $punto->move('punto_cuenta_adjudicacion',$nombre_solicitud);
                    $url= 'punto_cuenta_adjudicacion/'.$nombre_solicitud;
                    $request->punto_cuenta_adjudicacion = $url;

                    $punto=$request->file('lista_modificacion');
                    $ext=strstr($request->file('lista_modificacion')->getClientOriginalName(),".",false);
                    $nombre_solicitud="lista_modificacion".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
                    $punto->move('lista_modificacion',$nombre_solicitud);
                    $url= 'lista_modificacion/'.$nombre_solicitud;
                    $request->punto_cuenta_modificacion = $url;

                    //dd($url);

                    $punto=$request->file('memorandum_modificacion');
                    $ext=strstr($request->file('memorandum_modificacion')->getClientOriginalName(),".",false);
                    $nombre_solicitud="memorandum_modificacion".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
                    $punto->move('memorandum_modificacion',$nombre_solicitud);
                    $url= 'memorandum_modificacion/'.$nombre_solicitud;
                    $request->memorandum_modificacion = $url;
                    //dd('llegue',$request->all());
                    $nuevo = model_modificacion_presupuestaria::agregar_modificacion_presupuestaria($request);
                    //$agg_modificacion = model_presupuesto_temporal::agg($request);
                    $agg = model_presupuesto_temporal::agregar($request);
                    //dd($agg);
                    if ($nuevo and $agg) {
                        return view('notf.notf54');
                    }
                    else {
                        return view('notf.notf53');
                    }
                }else{
                    return view('notf.notf55');
                }
            }else {
                //dd('ya existe');
                return view('notf.notf53');
            }
        //dd($request->all());
        }else
            return view('notf.notf34');
    }
    public function unidad_traspaso($id)
    {
        $unidad_traspaso = model_presupuesto::unidad_traspaso($id);
        return $unidad_traspaso;
    }

    public function partida_cedente($id)
    {
        $partida_cedente=model_presupuesto::partida_cedente($id);
        //dd($partida_cedente);
        return $partida_cedente;
    }

    public function monto_disponible($id)
    {
        //dd($id);
        $monto_disponible = model_presupuesto::monto_disponible($id);
        //dd($monto_disponible);
        return $monto_disponible[0]->saldo_disponible;
    }


    public function view_reporte_presupuesto(Request $request)
    {
        $clasificador_presupuestario = model_clasificador_presupuestario::consulta_clasificador();
        $gerencia = model_unidad::unidad(1);
        $fuente = model_fondo::fondo();
        return view('supervisor.view_reportes_presupuesto',compact('clasificador_presupuestario','fuente','gerencia'));
    }

    public function proyecto($id)
    {
            $proyecto = model_proyecto::proyecto_general($id);
            return $proyecto;
    }
    public function reporte_presupuesto(Request $request){
        $reporte = model_presupuesto::reporte($request);
        //dd($request->all());
    }
    public function consultar_disponibilidad(Request $request){
        $anio = model_presupuesto::anio();
        $fondo = model_fondo::fondo();
        $consulta = model_presupuesto::consulta_disponibilidad($request);
        if(count($consulta)==0){
            return view('notf.notf97');
        }
        $pdf = \PDF::loadView('consulta_disponibilidad_pdf',compact('consulta'));
        //return view('consulta_disponibilidad_pdf',compact('consulta'));
        return $pdf->download('Disponibilidad_Presupuestaria','.pdf');
        //return view('usuario.view_disponibilidad_presupuestaria',compact('consulta','anio','fondo'));
    }
}
