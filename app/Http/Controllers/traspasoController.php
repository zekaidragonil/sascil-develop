<?php

namespace App\Http\Controllers;

use App\Models\model_fondo;
use Illuminate\Http\Request;
use App\Models\model_traspaso;
use App\Models\model_usuario;
use App\Models\model_traspaso_analista;
use App\Models\model_proceso_traspaso;
use App\Models\model_proyecto;
use App\Models\model_traspaso_unidades;
use App\Models\model_unidad;

class traspasoController extends Controller
{

    // consulta para llenar el select de despliegue de transferencia de partidas partidas presupuestarias
    public function proyectos($id){
        if (session('id')) {
            $proyectos=model_proyecto::proyecto_fuente($id);
            return $proyectos;
        }else
            return view('notf.notf34');
    }
    public function partida($id)
    {
        if (session('id')) {
            //dd('llegue',$id);
            $partida=model_traspaso::partidas($id);
            //dd($id,$partida);
            return $partida;
        }else
            return view('notf.notf34');
    }
    public function monto_traspaso($id,$id2){
        if (session('id')) {
            $monto=model_traspaso::monto_traspaso($id,$id2);
            return $monto;
        }else
            return view('notf.notf34');
    }

    public function partida_destino($id)
    {
        if (session('id')) {
            $partida=model_traspaso::partidas($id);
            return $partida;
        }else
            return view('notf.notf34');
    }

    public function monto_destino($id,$id2){
        if (session('id')) {
            $monto=model_traspaso::monto_traspaso($id,$id2);
            foreach ($monto as $key => $value) {
                $monto[$key]->saldo_disponible = number_format($value->saldo_disponible,2,',','.');
            }
            return $monto;
        }else
            return view('notf.notf34');
    }


    public function lista_traspaso_unidad(Request $request)
    {
        if(session('id'))
        {
            //dd('llegue');
            $lista=model_traspaso::lista_traspaso_unidad();
            //dd($lista);
            return view('usuario.lista_traspaso_unidad',compact('lista'));
        }else
        return view('notf.notf34');
    }

    public function solicitud_proceso(Request $request){
        if($request->adjuntar==1){
            $id_traspaso = $request->id_traspaso;
            $solicitud = $request->solicitud_traspaso;
            //dd($solicitud);
            return view('usuario.view_adjuntar_traspaso',compact('id_traspaso','solicitud'));
        }
        $consulta_traspaso = model_proceso_traspaso::consulta_traspaso($request->id_traspaso);
        //dd($consulta_traspaso);
        return view('usuario.view_solicitud_traspaso',compact('consulta_traspaso'));
    }

    public function adjuntar_solicitud_traspaso(Request $request){
        //dd($request->all());
        
        $doc=$request->file('memorandum_traspaso');
        $ext=strstr($request->file('memorandum_traspaso')->getClientOriginalName(),".",false);
        $memorandum="solicitudes_traspaso_".session("id_ente").'_'.session('id_unidad').'_'.$request->numero_solicitud.'_'.date('d-m-Y').$ext;
        $request->memorandum_traspaso = 'memorandum_traspaso/'.$memorandum;
        //dd($request->memorandum_traspaso);
        $doc->move('memorandum_traspaso', $memorandum);
        
        $doc=$request->file('solicitud_credito_presupuestario');
        $ext=strstr($request->file('solicitud_credito_presupuestario')->getClientOriginalName(),".",false);
        $solicitud="solicitud_credito_presupuestario_".session("id_ente").'_'.session('id_unidad').'_'.$request->numero_solicitud.'_'.date('d-m-Y').$ext;
        $request->solicitud_credito_presupuestario = 'solicitud_credito_presupuestario/'.$solicitud;
        $doc->move('solicitud_credito_presupuestario', $solicitud);
        //dd($request->solicitud_credito_presupuestario);
        $actualizar_archivo = model_traspaso::actualizar_traspaso($request);
        if($actualizar_archivo){
            return view('notf.notf94');
        }else{
            return view('notf.notf95');
        }
    }

    public function asignar_traspaso()
    {
        if(session('id'))
        {
            $usuario = model_usuario::analistas(4,16);
            //dd($usuario);
            $lista = model_traspaso::lista_traspaso();
            //dd($lista);
            return view('supervisor.asignar_traspaso',compact('usuario','lista'));
        }else
        return view('notf.notf34');
    }

    public function lista_traspasasos_asignados()
    {
        if(session('id')){
            $lista = model_traspaso_analista::lista();
            //dd($lista);
            return view('supervisor.lista_traspaso_asignado',compact('lista'));
        }else
            return view('notf.notf34');
    }

    public function view_traspaso_entre_unidades()
    {
        if(session('id')){
            $fuente = model_fondo::fondo();
            //dd($fuente,$unidades);
            return view('supervisor.view_traspaso_entre_unidades',compact('fuente'));
        }else
        return view('notf.notf34');
    }

    public function traspaso_entre_unidades(Request $request)
    {

        $traspaso_unidades=$request->file('traspaso_entre_unidades');
        $ext=strstr($request->file('traspaso_entre_unidades')->getClientOriginalName(),".",false);
        $nombre_traspaso_entre_unidades="lista_traspaso_entre_unidades".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
        $traspaso_unidades->move('lista_traspaso_unidades',$nombre_traspaso_entre_unidades);
        $url= 'lista_traspaso_unidades/'.$nombre_traspaso_entre_unidades;
        $request->traspaso_entre_unidades = $url;
        //dd($request->traspaso_entre_unidades);
        $traspaso_unidades = model_traspaso_unidades::trapaso_unidad($request);

        return view('notf.notf96');
        //dd($request->all());
    }

    //paorbar proceso de traspaso presupuestario
    public function aprobar_traspaso(Request $request){
        //dd($request->all());
        unlink($request->original_solicitud_credito_presupuestario);
        $doc=$request->file('solicitud_credito_presupuestario');
        $ext=strstr($request->file('solicitud_credito_presupuestario')->getClientOriginalName(),".",false);
        $solicitud="solicitud_credito_presupuestario_".session("id_ente").'_'.$request->id_unidad.'_'.$request->solicitud_traspaso.'_'.date('d-m-Y').$ext;
        $request->solicitud_credito_presupuestario = 'solicitud_credito_presupuestario/'.$solicitud;
        $doc->move('solicitud_credito_presupuestario', $solicitud);
        //dd($request->solicitud_credito_presupuestario);

        $aprobado=model_traspaso::aceptar($request);
        if ($aprobado) {
            return view('notf.notf43');
        }
    }
    public function rechazar_traspaso(Request $request){
        $rechazar = model_traspaso::rechazar($request);
        if ($rechazar) {
            return view('notf.notf45');
        }
    }
}
