<?php

namespace App\Http\Controllers;

use App\Models\model_anticipo;
use Illuminate\Http\Request;
use App\Models\model_usuario;
use App\Models\model_solicitud;
use App\Models\model_solicitud_has_analista;
use App\Models\model_estatus;
use App\Models\model_fianza;
use App\Models\model_instrumento_legal;
use App\Models\model_moneda;
use App\Models\model_revision_instrumento_legal;
use App\Models\model_factura;

class instrumento_legalController extends Controller
{

    public function asignar_solicitud_contrato()
    {
        if(session('id')){
            $analista_juridico = model_usuario::analistas_juridico(4,8);
            $solicitud_adjudicada = model_solicitud::solicitud('ADJUDICADO');
            //dd($analista_juridico,$solicitud_adjudicada->all());
            return view('supervisor.view_lista_solicitudes_adjudicadas',compact('analista_juridico','solicitud_adjudicada'));
        }else
            return view('notf.notf34');
    }

    public function asignar_solicitud_adjuntada_analista_juridico(Request $request)
    {
        if(session('id')){
            //dd($request->ver);
            if($request->ver==1){
                $archivos = model_solicitud::solicitud_juridico($request);
                //dd($archivos[0]->numero_asignado);
                return view('supervisor.view_expediente_consultor_juridico',compact('archivos'));
            }
            $actualizar = model_solicitud_has_analista::asignar_solicitud_adjudicada($request);
            if ($actualizar)
                return view('notf.notf88');
            else
                return view('notf.notf89');
        }else
        return view('notf.notf34');
    }


    public function lista_solicitudes_asignadas_juridico()
    {
        if(session('id')){
            $lista_asignado_juridico = model_solicitud::solicitud_asignada();
            //dd($lista_asignado_juridico->all());
            return view('supervisor.view_lista_solicitudes_asignadas_juridico',compact('lista_asignado_juridico'));
        }else
        return view('notf.notf34');
    }
    
    public function consultar_contrato_asignado(Request $request){
        if(session('id')){
            $archivos = model_solicitud::solicitud_juridico($request);
            $fianza = model_fianza::consulta_solicitud($request->id_solicitud);

            //dd($fianza);
            return view('supervisor.view_consultar_solicitud_contrato_gerente',compact('archivos','fianza'));
        }else
            return view('notf.notf34');
    }


    public function analizar_solicitud_contrato_juridico()
    {
        if(session('id')){
            $solicitud = model_solicitud::solicitud_asignada_analista();
            //$fianza = model_fianza::consulta_solicitud($solicitud[0]->id);
            return view('usuario.view_solicitud_analizar_juridico',compact('solicitud'));
        }else
            return view('notf.notf34');
    }

    public function analizar_solicitud_consultor_juridico(Request $request)
    {
        if(session('id')){
            $solicitud = model_solicitud::solicitud_juridico($request);
            $estatus = model_estatus::estatus_juridico();
            $moneda = model_moneda::divisa();
            $fianza = model_fianza::consulta_solicitud($solicitud[0]->id);
            //dd($fianza);
            return view('usuario.view_actualizar_estatus_solicitud_juridico',compact('estatus','solicitud','moneda','fianza'));
        }else
            return view('notf.notf34');
    }

    public function actualizacion_estatus_solicitud_juridico(Request $request)
    {
        if(session('id')){
            if($request->numero_contrato != null){
                $instrumento_legal = model_instrumento_legal::guardar($request);
                return view('notf.notf92');
            }
            if($request->borrador_contrato){
                //dd('ingrese');
                $actualizar = model_revision_instrumento_legal::borrador_contrato($request); 
                return view('notf.notf90');
            }
            else
                return view('notf.notf91');
        }else
            return view('notf.notf34');
    }

    public function lista_contratos_suscritos()
    {
        if(session('id')){
            $contratos = model_instrumento_legal::consulta();
            return view('usuario.view_lista_instrumentos_legales',compact('contratos'));
        }else
            return view('notf.notf34');    
    }

    public function anticipo($data){
        $anticipo = model_anticipo::anticipo(intval($data));
        $factura = model_factura::validar($data);
        //dd($factura, $anticipo);
        if ($factura and $anticipo) {
            return true;
        }else
        {
            return false;
        }
    }

    public function estatus_instrumento_legal(){
        if(session('id')){
            $consulta_contratos = model_instrumento_legal::consulta_unidad(session('id_unidad'));
            //dd($consulta_contratos);
            return view('usuario.view_lista_instrumentos_legales_unidad',compact('consulta_contratos'));
        }else
            return view('notf.notf34');
    }
}