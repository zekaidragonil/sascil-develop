<?php

namespace App\Http\Controllers;

use App\Models\model_fuente_financiamiento;
use Illuminate\Http\Request;
use App\Models\model_proyecto;
use App\Models\model_presupuesto;
use App\Models\model_fondo;
use App\Models\model_denominacion_proyecto;
use App\Imports\ImportData;
use App\Imports\ImportData2;
use App\Models\model_certificacion_presupuestaria;
use App\Models\model_clasificador_presupuestario;
use Maatwebsite\Excel\Facades\Excel;


class proyectoController extends Controller
{
    public function proyecto ()
    {
        if(session('id'))
        {
            if(model_proyecto::poa(session('id_unidad')))
            {
                $id_proyecto=model_proyecto::proyec(session('id_unidad'));
                $certificacion = model_certificacion_presupuestaria::certificacion_aprobada();
                //dd($certificacion);
                return view('supervisor.view_solicitud', compact('certificacion','id_proyecto'));
                //dd('puede cargar solicitudes al sistema');//llevar a otro controlador donde estan las solicitudes
            }else
                {
                    switch (session('id_perfil')) {
                        case 2://caso usuario
                            {
                                return view('notf.notf17');//indica que el poa no se ha cargado y redirecciona al inicio
                                break;
                            }
                        case 3://caso supervisor
                            {
                                return view('notf.notf16');//indica que el POA no existe y debe cargarse
                                break;
                            }
                    }
                }
        }else
            return view('notf.notf34');
    }
    public function view_guardar_proyecto()
    {
        if(session('id'))
        {
            foreach (model_fondo::fondo() as $key => $value) {
                $fondo[]=$value;
            }
            //dd($fondo);
            //dd(model_proyecto::poa(session('id_unidad')));
            //if(model_proyecto::poa(session('id_unidad')))
                //return view('notf.notf20');
            //crear una categoria en base de datos para definir las categorias del POA
            $numero = model_proyecto::ultimo(session('id_ente'));
            //dd($numero);
            $unidades=model_proyecto::unidad_proyecto();
            //proyectos y codigos del proyecto
            $denominacion = model_denominacion_proyecto::denominacion_p();
            return view('supervisor/view_guardar_proyecto',compact('unidades','numero','fondo','denominacion'));//formulario para guardar proyecto
        }else
            return view('notf.notf34');
    }
    public function guardar_proyecto(Request $proyecto)
    {
        //dd($proyecto->all());
        if(session('id'))
        {
            //dd($proyecto);
            $aux=model_proyecto::guardar_proyecto($proyecto);//retornar una notificación que indique el proyecto se a registrado de forma exitosa
            //dd($proyecto);
            if($aux)
                return view('notf.notf21'); // el poa se cargo de forma exitosa
            else
                return view('notf.notf25');//algo fallo al cargar el POA de esta unidad
        }else
            return view('notf.notf34');
    }
    public function lista_poa()
    {
        if(session('id'))
        {
            //dd('llegue a lista');
            $proyectos=model_proyecto::proyecto();
            //dd($proyectos);
            return view('usuario.lista_proyectos',compact('proyectos'));
        }else
            return view('notf.notf34');
    }
    public function select_lista_partida($id)
    {
        if(session('id')){
            $partidas = model_presupuesto::partidas($id);
            return $partidas;
        }else
            return view('notf.notf34');
    }
    public function monto_disponible($id,$proyecto)
    {
        if(session('id')){
            //dd($id,$proyecto);
            $partidas = model_presupuesto::monto($id,$proyecto);
            //dd($partidas);
            return $partidas;
        }else
            return view('notf.notf34');
    }
    public function view_carga_masiva(){
        if(session('id')){
            $proyecto = model_proyecto::ultimo_anio();
            //dd($carga);
            $partida = model_presupuesto::ultima_anio();
            return view('supervisor.view_carga_masiva',compact('proyecto','partida'));
        }else
            return view('notf.notf34');
    }

    public function nombre_proyecto($id){
        if(session('id')){
            //dd($id);
            $nombre_p = model_denominacion_proyecto::n_proyecto($id);
            //dd($nombre_p);
            return $nombre_p;
        }else
            return view('notf.notf34');
    }

    public function carga_masiva(Request $request)
    {
        if(session('id')){
            //dd($request->file('proyectos'),$request->hasFile('proyectos'));
            $data=Excel::import(new ImportData(),$request->file('proyectos'));
            $data=Excel::import(new ImportData2(),$request->file('partidas'));
            return view('notf.notf38');
        }else
            return view('notf.notf34');
    }
    public function view_añadir_llave_presupuestaria(){
        if(session('id')){
            //dd('llegue');
            $consulta = model_proyecto::consulta_proyectos();
            //dd($consulta);
            return view('usuario.view_añadir_llave_presupuestaria',compact('consulta'));
        }else
            return view('notf.notf34');
    }

    //consulta para el proceso de traspaso entre unidades
    public function area_funcional($id)
    {
        
        $area_funcional = model_proyecto::area_funcional($id);
        return $area_funcional;
    }
}