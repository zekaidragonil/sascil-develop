<?php

namespace App\Http\Controllers;

use App\Models\model_actas;
use App\Models\model_auditoria;
use Illuminate\Http\Request;
use App\Models\model_solicitud;
use App\Models\model_proyecto;
use App\Models\model_certificacion_presupuestaria;
use App\Models\model_certificacion_presupuestaria_has_presupuesto;
use App\Models\model_presupuesto;
use App\Models\model_unidad;
use App\Models\model_usuario;
use App\Models\model_fondo;
use App\Models\model_modificacion_presupuestaria;
use App\Models\model_presupuesto_temporal;
use App\Models\model_moneda;
use App\Models\model_tipo_contratacion;
use App\Models\model_modalidad_contratacion;
use App\Models\model_modificacion_analista;
use App\Models\model_solicitud_has_analista;
use App\Models\model_solicitud_gerente;
use App\Models\model_estatus;
use App\Models\model_empresa;
use App\Models\model_empresa_has_solicitud;
use App\Models\model_fianza;
use Facade\FlareClient\Http\Response;
use PDF;
class solicitudController extends Controller
{
    public function guardar_solicitud(Request $solicitud)
    {
        if(session('id'))
        {
            $id_solicitud=model_solicitud::id_solicitud();
            //dd(model_solicitud::val_solicitud($solicitud->numero_punto));

            if(model_solicitud::val_solicitud($solicitud->numero_punto)) // comprobando que no exista otra solicitud con el mismo punto de cuenta
                return view('notf.notf22');
            //dd($solicitud);
            //--------------------------------
            //tratamiento del punto de cuenta
            //--------------------------------
            $doc=$solicitud->file('punto_cuenta');
            $ext=strstr($solicitud->file('punto_cuenta')->getClientOriginalName(),".",false);
            $nombre1="punto_cuenta_".$solicitud->numero_punto.'_'.session('id_ente').'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('punto_inicio', $nombre1);

            //----------------------------------------------
            //tratamiento de la certificacion presupuestaria
            //----------------------------------------------
            $doc=$solicitud->file('c_presupuestaria');
            $ext=strstr($solicitud->file('c_presupuestaria')->getClientOriginalName(),".",false);
            $nombre2="certificacion_presupuestaria_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('certificacion_presupuestaria', $nombre2);

            //----------------------------------------------
            //tratamiento de la estimacion de costos
            //----------------------------------------------
            $doc=$solicitud->file('e_costo');
            //dd($doc);
            if($doc != null)
            {
                $ext=strstr($solicitud->file('e_costo')->getClientOriginalName(),".",false);
                $nombre3="estimacion_costos_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
                $doc->move('estimacion_costos', $nombre3);
            }else
            {
                $nombre3 = '';
            }


            //----------------------------------------------
            //tratamiento de las Espesificaciones Técnicas
            //----------------------------------------------
            $doc=$solicitud->file('e_tecnicas');
            if($doc != null)
            {
                $ext=strstr($solicitud->file('e_tecnicas')->getClientOriginalName(),".",false);
                $nombre4="espesificaciones_tecnicas_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
                $doc->move('espesificaciones_tecnicas', $nombre4);
            }else
            {
                $nombre4='';
            }
            //----------------------------------------------
            //tratamiento del forma 018
            //----------------------------------------------
            $doc=$solicitud->file('forma_018');
            $ext=strstr($solicitud->file('forma_018')->getClientOriginalName(),".",false);
            $nombre5="forma_018_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('forma_018', $nombre5);

            //----------------------------------------------
            //tratamiento de la Matriz Técnica
            //----------------------------------------------
            $doc=$solicitud->file('m_tecnica');
            if($doc != null)
            {
                $ext=strstr($solicitud->file('m_tecnica')->getClientOriginalName(),".",false);
                $nombre6="matriz_tecnica_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
                $doc->move('matriz_tecnica', $nombre6);
            }else
            {
                $nombre6='';
            }
            //----------------------------------------------
            //tratamiento del memorandum
            //----------------------------------------------
            $doc=$solicitud->file('memorandum');
            $ext=strstr($solicitud->file('memorandum')->getClientOriginalName(),".",false);
            $nombre7="memorandum_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('memorandum', $nombre7);

            //----------------------------------------------
            //tratamiento de opinion de bienes nacionales
            //----------------------------------------------
            $doc=$solicitud->file('bienes_nacionales');
            $ext=strstr($solicitud->file('bienes_nacionales')->getClientOriginalName(),".",false);
            $nombre8="bienes_nacionales_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('bienes_nacionales', $nombre8);

            //----------------------------------------------
            //tratamiento de opinion de ASHO
            //----------------------------------------------
            $doc=$solicitud->file('opinion_asho');
            $ext=strstr($solicitud->file('opinion_asho')->getClientOriginalName(),".",false);
            $nombre9="opinion_asho_".session("id_ente").'_'.session('id_unidad').'_'.$id_solicitud.$ext;
            $doc->move('opinion_asho', $nombre9);

            $ruta = array(
                "url1"=>"punto_inicio/".$nombre1,
                "url2"=>"certificacion_presupuestaria/".$nombre2,
                "url3"=>"estimacion_costos/".$nombre3,
                "url4"=>"espesificaciones_tecnicas/".$nombre4,
                "url5"=>"forma_018/".$nombre5,
                "url6"=>"matriz_tecnica/".$nombre6,
                "url7"=>"memorandum/".$nombre7,
                "url8"=>"bienes_nacionales/".$nombre8,
                "url9"=>"opinion_asho/".$nombre9
            );
            $id=model_proyecto::proyec(session('id_unidad'));
            $aux=model_solicitud::guardar_solicitud($solicitud,$id,$ruta);

            if($aux==true)
                return view('notf.notf18');
            else
                return view('notf.notf19');
        }else
            return view('notf.notf34');
    }


    public function certificado_presupuestario()
    {
        if(session('id'))
        {
            //dd(session('id_unidad'));
            $proyecto=model_proyecto::proyecto_unidad();
            //necesito todo la informacion compilada aqui
            //dd($proyecto);
            $aux=model_unidad::unidad_ind(session('id_unidad'));
            $nombre_unidad=$aux[0]->nombre;
            $divisa = model_moneda::divisa();
            //dd($divisa);
            //dd($proyecto);
            //$presupuesto = model_presupuesto::select_lista_partida();
            return view('usuario.view_solicitar_certificacion',compact('proyecto','nombre_unidad','divisa')); // solicitud de certifiacion presupuestaria
        }else
            return view('notf.notf34');
    }
    public function solicitud_certificado_presupuesto(Request $request)
    {
        if(session('id'))
        {
            //dd($request->all());
        $cont=0;
        $nf = new \NumberFormatter('ES', \NumberFormatter::SPELLOUT);
        
        //dd($request->all());
        $nombre_unidad = model_unidad::unidad_ind(session('id_unidad'));
        $doc=['observaciones'=>$request->objeto,'unidad'=>$nombre_unidad[0]->nombre];
        //dd($data);
        $monto_estimado=0;
        $var=null;
        //dd($data[5]["monto_certificar"]);
        $cont=0;
        $total = 0;
        //dd($request->numero);
        for ($i=0; $i < count($request->numero) ; $i++) {
            //dd($request->moneda);
            $var[$cont]=[
                'monto_certificar'=>$request->monto_certificar[$i],
                'codigo_partida'=>$request->id_partida[$i],
                'id_proyecto'=>$request->codigo_proyecto[$i],
                'codigo_proyecto'=>$request->codigo_proyecto[$i],
                'fondo'=>$request->fondo[$i],
                'monto_partida'=>$request->monto_partida[$i],
                'saldo_disponible' =>
                doubleVal(str_replace(',','.',str_replace('.','',$request->saldo_disponible[$i])))-doubleVal(str_replace(',','.',str_replace('.','',$request->monto_certificar[$i]))),
                'nombre_proyecto' => $request->nombre_proyecto[$i],
                'moneda'=>$request->moneda,
                'tasa'=>$request->tasa,
            ];
            //dd($var);
            //$cardinal = $nf->format(intVal($request->$monto)); //esta variable es para guardar el monto expresado en letras
            $total = $total + doubleval(str_replace(',','.',str_replace('.','',$request->monto_certificar[$i])));
            $cont++;
        }
        //dd($total);
        //dd('llegue',$var,$request->all());
        //dd($data[1]);
        $moneda = $request->moneda;
        $tasa = floatval(str_replace(',','.',$request->tasa));
        $aux = floatval(str_replace('.','',$request->divisa));
        $divisa=floatval(str_replace(',','.',str_replace('.','',$request->divisa)));
        
        //dd($aux,$request->divisa);
        $monto_estimado = floatval(str_replace(',','.',str_replace('.','',$request->estimado),$monto_estimado));
        //dd($divisa,$tasa,$moneda,$monto_estimado);
        //dd(date('d-m-Y'));
        //dd($request->generar_solicitud);
        //dd($data);
        if ($request->generar_solicitud == 1) {
            //dd($request->all(),'entre');
            $pre = model_usuario::gerente('GERENCIA GENERAL DE PLANIFICACIÓN, PRESUPUESTO Y SEGUIMIENTO Y CONTROL');
            //dd($pre);
            $gerente_pre=['nombre' => $pre[0]->nombre,'apellido' => $pre[0]->apellido];
            $uni = model_usuario::gerente_unidad();
            //dd('llegue',$uni);
            $gerente_un = ['nombre'=> $uni[0]->nombre,'apellido' => $uni[0]->apellido];
            //dd($gerente_un);
            $nombre_u= model_unidad::unidad_ind(session('id_unidad'));
            $siglas=substr($nombre_u[0]->nombre,0,3);
            $cont=model_certificacion_presupuestaria::conteo_solicitud();
            //dd($var);

            //dd($cont);
            //dd($cont);//colocar de ceros del lado izquierdo de acuerdo a los unidades, decenas y centenas
            $cardinal = $nf->format(doubleVal($monto_estimado));
            //dd($request->all(),$cardinal);
            $objeto = $request->objeto;
            //nombre de la certificacion
            $unidad = model_unidad::unidad_ind(session('id_unidad'));
            $nombre_unidad =$unidad[0]->nombre[0];
            $certificado = model_certificacion_presupuestaria::select('correlativo_unidad')->orderBy('id','desc')->first();
            //dd($certificado);
            if($certificado==null){
                $certificado=1;
                $ident = substr(str_repeat(0, 4).$certificado, - 4);
            }else{
                $ident = substr(str_repeat(0, 4).$certificado->correlativo_unidad+1, - 4);
            }
            
            $aux = model_unidad::sigls_cert(session('id_unidad'));
            //dd($aux);
            $siglas = $aux[0]->siglas_cert;
            $cert=$siglas.'-'.$ident.'-'.date('Y');
            //
            //dd($cert);
            if($var==null){
                return view('notf.notf58');
            }
            //calculo del monto en divisa en bs * la tasa sigerida en bs
            $monto_total = $tasa*$monto_estimado;
            //dd($monto_estimado);
            $cont=count($var);
            //dd($request->all(),$moneda,$tasa,$divisa);
            //dd($cert,$monto_estimado,$moneda,$divisa,$tasa,$var,$doc,$gerente_pre,$gerente_un,$cardinal,$objeto,$cont);
            //dd('llegue a este punto');
            //dd($divisa);
            $pdf = PDF::loadView('solicitud_pdf',compact('cert','monto_estimado','moneda','divisa','tasa','var','doc','gerente_pre','gerente_un','cardinal','objeto','cont','total'));
            //return view('solicitud_pdf',compact('cert','monto_estimado','moneda','divisa','tasa','var','gerente_pre','gerente_un','doc','cardinal','objeto','cont'));
            return $pdf->download($cert.'.pdf');
        }
        }else
            return view('notf.notf34');
        if(session('id'))
        {
            //dd('guardar solicitud',$request->all());
            if($request->file('justificacion_solicitud')!=null)
            {
                $ext=strstr($request->file('justificacion_solicitud')->getClientOriginalName(),".",false);
                $nombre_solicitud="solicitud_certificacion_presupuestaria".'_'.session('id_unidad').'_'.date('Y-m-d_h:i:s').$ext;
                $doc->move('solicitudes_certificar_presupuesto',$nombre_solicitud);
                $url1= 'solicitudes_certificar_presupuesto/'.$nombre_solicitud;
                //dd($url1);
            }else{
                //dd('url vacio');
                $url1='';
            }
            $correlativo = model_certificacion_presupuestaria::correlativo();
            //dd($correlativo);
            if(count($correlativo) == 0){
                $corr = 1;
            }else{
                //dd($correlativo);
                $corr=$correlativo[0]->correlativo_unidad + 1;
            }
            //dd($request->all());
            $cert=model_certificacion_presupuestaria::solicitud_certificado($request,$corr);
            //dd($cert);
            $certificacion=model_certificacion_presupuestaria::ultima_solicitud();
            $aux = model_certificacion_presupuestaria::ultimo_id();
            $ultimo_id = $aux->id;
            //dd('llegue',$ultimo_id->id);
            $var=model_certificacion_presupuestaria_has_presupuesto::solicitud_certificado($request,$ultimo_id);
            //dd($var);
            if($var)
                return view('notf.notf25');
            else
                return view('notf.notf26');
        }else
            return view('notf.notf34');
    }

    public function consulta_presupuestaria(){
        if(session('id'))
        {
            //dd(session('id_unidad'));
            $proyecto=model_proyecto::proyecto_unidad();
            //dd($proyecto);
            //necesito todo la informacion compilada aqui
            $aux=model_unidad::unidad_ind(session('id_unidad'));
            $nombre_unidad=$aux[0]->nombre;
            return view('usuario.view_consulta_presupuestaria',compact('proyecto','nombre_unidad')); // solicitud de certifiacion presupuestaria
        }else
            return view('notf.notf34');
    }

    public function mostrar_solicitud()
    {
        if(session('id'))
        {
            $consulta=model_solicitud::mostrar_solicitud(session('id_unidad'));
            //dd($consulta);
            return view('supervisor.lista_solicitudes',compact('consulta'));
        }else
            return view('notf.notf34');
    }

    public function verificar_certificacion(Request $verificar){
        if(session('id'))
        {
            //dd($verificar->all());
            $revision= model_certificacion_presupuestaria::revision_certificacion($verificar);
            //dd($revision);
            return view('usuario.actualizacion_certificado',compact('revision'));
        }else
            return view('notf.notf34');
    }

    public function verificar_solicitud(Request $solicitud)
    {
        //dd('hola llegue');
        if(session('id'))
        {
            //dd(session('id_perfil'));
            $archivos=model_solicitud::verificar($solicitud->id_solicitud);
            //dd(session('id_perfil'));
            if(session('id_perfil') == 3)
                return view('usuario.lista_archivo',compact('archivos'));
                //return view('supervisor.lista_archivos',compact('archivos'));
            else
            {
                return view('supervisor.lista_archivo',compact('archivos'));
            }
        }else
            return view('notf.notf34');
    }

    public function verificar_solicitud_unidad()
    {
        if(session('id'))
        {
            $solicitudes=model_solicitud::lista_solicitudes_unidad();
            //dd($solicitudes);
            return view('usuario.lista_solicitudes',compact('solicitudes'));
        }else
            return view('notf.notf34');
    }
    public function verificar_solicitud_completas()
    {
        //dd('llegue');
        if(session('id'))
        {
            //dd('entre');
            $solicitudes=model_solicitud::lista_solicitudes_numeradas();
            //(dd($solicitudes);
            return view('supervisor.lista_solicitudes_numeradas',compact('solicitudes'));
        }else
            return view('notf.notf34');
    }

    public function lista_solicitudes_completas_regional()
    {
        //dd('llegue');
        if(session('id'))
        {
            //dd('entre');
            $solicitudes=model_solicitud::lista_solicitudes_regional();
            //dd($solicitudes);
            return view('supervisor.lista_solicitudes_numeradas',compact('solicitudes'));
        }else
            return view('notf.notf34');
    }

    public function revision_solicitud(Request $revision)
    {
        if(session('id'))
        {
            //actualizar estatus de solicitudes
            //dd($revision->observacion);
            $actualizar = model_solicitud::actualizar_estatus($revision);
            if($actualizar)
                return view('notf.notf23');
            else
                return view('notf.notf24');
        }else
        return view('notf.notf34');
    }
    // public function solicitudes_espera()//consultar certifiaciones solicitades por la unidades administrativas
    // {
    //     //dd('llegue');
    //     if(session('id'))
    //     {
    //         $consulta=model_certificacion_presupuestaria::solicitud_certificacion('En Transito');
    //         // dd($consulta);
    //         $estatus = 'Enviadas';
    //         return view('usuario.lista_certificaciones_unidad',compact('consulta','estatus'));
    //     }else
    //         return view('notf.notf34');
    // }
    // public function solicitudes_revisado()//consultar certifiaciones solicitades por la unidades administrativas
    // {
    //     //dd('llegue');
    //     if(session('id'))
    //     {
    //         $consulta=model_certificacion_presupuestaria::solicitud_certificacion('Revisado');
    //         // dd($consulta);
    //         $estatus = 'Revisado';
    //         return view('usuario.lista_certificaciones_unidad',compact('consulta','estatus'));
    //     }else
    //         return view('notf.notf34');
    // }
    // public function solicitudes_aprobado()//consultar certifiaciones solicitades por la unidades administrativas
    // {
    //     //dd('hola');
    //     if(session('id'))
    //     {
    //         $consulta=model_certificacion_presupuestaria::solicitud_certificacion('aprobado');
    //         $estatus = 'Aprobado';
    //         //dd($consulta);
    //         return view('usuario.lista_certificaciones_unidad',compact('consulta','estatus'));
    //         //dd($consulta);
    //     }else
    //         return view('notf.notf34');
    // }
    // public function solicitudes_rechazado()//consultar certifiaciones solicitades por la unidades administrativas
    // {
    //     //  dd('hola');
    //     if(session('id'))
    //     {
    //         $consulta=model_certificacion_presupuestaria::solicitud_certificacion('Rechazado');
    //         $estatus='Rechazado';
    //         //dd($consulta);
    //         return view('usuario.lista_certificaciones_unidad',compact('consulta','estatus'));
    //         //dd($consulta);
    //     }else
    //         return view('notf.notf34');
    // }

    // public function solicitudes_reversado()//consultar certifiaciones solicitades por la unidades administrativas
    // {
    //     //  dd('hola');
    //     if(session('id'))
    //     {
    //         $consulta=model_certificacion_presupuestaria::solicitud_certificacion('reversado');
    //         $estatus = 'Reversado';
    //         //dd($consulta);
    //         return view('usuario.lista_certificaciones_unidad',compact('consulta','estatus'));
    //         //dd($consulta);
    //     }else
    //         return view('notf.notf34');
    // }
    
    public function lista_solicitud()//consultar certifiaciones solicitades por la unidades administrativas
    {
        
        //dd();
        if(session('id'))
        {
            $consulta=model_certificacion_presupuestaria::solicitud_certificacion();
            $estatus='Guardado';
            //dd($consulta);
            return view('usuario.lista_certificaciones_unidad',compact('consulta'));
            //dd($consulta);
        }else
            return view('notf.notf34');
    }

    public function modificar_certificacion(Request $request){
        if(session('id'))
        {
            //dd($request);
            $act=model_certificacion_presupuestaria::consulta_solicitud($request);
            //dd($act);
            return view('usuario.actualizar_estatus_solicitud',compact('act'));
        }else
            return view('notf.notf34');
    }
    public function actualizar_estatus_solicitud(Request $request){
        if(session('id'))
        {
            //dd($request->all());
            $doc=$request->file('solicitud');
            $ext=strstr($request->file('solicitud')->getClientOriginalName(),".",false);
            $nombre_solicitud="solicitud_certificacion_presupuestaria".'_'.session('id_unidad').'_'.date('Y-m-d_h:i:s').'_'.$request->correlativo_unidad.$ext;
            $url1= 'solicitudes_certificar_presupuesto/'. $nombre_solicitud;
            $actualizar = model_certificacion_presupuestaria::actualizar_estatus_solicitud(intVal($request->id),$url1);
            if($actualizar)
                {
                    $doc->move('solicitudes_certificar_presupuesto', $nombre_solicitud);
                    return view('notf.notf44');
                }
            else
                return view('notf.notf45');
        }else
            return view('notf.notf34');
    }


    public function actualizacion_presupuestaria(Request $request){
        //dd($request->all());
        if(session('id'))
        {
            $proyecto='proyecto'.$request->key;
            $id_presupuesto = 'id_presupuesto'.$request->key;
            $id_proyecto = 'id_proyecto'.$request->key;
            $proyecto_presupuestario = 'proyecto_presupuestario'.$request->key;
            $fondo = 'fondo'.$request->key;
            $id_fondo = 'id_fondo'.$request->key;
            $codigo_partida = 'codigo_partida'.$request->key;
            $id_codigo_partida = 'id_codigo_partida'.$request->key;
            $monto_partida = 'monto_partida'.$request->key;
            $monto = 'monto'.$request->key;
            $data=['proyecto'=>$request->$proyecto,'id_presupuesto'=>$request->$id_presupuesto,'id_proyecto'=>$id_proyecto,'proyecto_presupuestario'=>$request->$proyecto_presupuestario,'fondo'=>$request->$fondo,'id_fondo'=>$request->$id_fondo,'codigo_partida'=>$request->$codigo_partida,'id_codigo_partida'=>$request->$id_codigo_partida,'monto_partida'=>$request->$monto_partida,'monto'=>$request->$monto];
            $fondo= model_fondo::fondo();//campo de seleccion del fondo
            return view('usuario.view_modificacion_presupuestaria',compact('data','fondo'));
        }else
        return view('notf.notf34');
    }
    public function actualizar_presupuesto(Request $request){
        //dd($request->all());
        if(session('id'))
        {
            $comprobar= model_modificacion_presupuestaria::consultar($request);
            if($comprobar == 'solicitud en proceso'){
                return view('notf.notf48');
            }
            if($comprobar)
                return view('notf.notf49');
            $doc=$request->file('punto_cuenta');
            $ext=strstr($request->file('punto_cuenta')->getClientOriginalName(),".",false);
            $nombre_solicitud="solicitud_modificacion_presupuestaria".'_'.session('id_unidad').'_'.date('Y-m-d').$ext;
            $url= 'modificacion_presupuestaria/'. $nombre_solicitud;
            $doc->move('modificacion_presupuestaria', $url);
            //dd($url);
            $agregar=model_modificacion_presupuestaria::agregar_modificacion_presupuestaria($request,$url);
            if ($agregar) {
                return view('notf.notf46');
            }else
                return view('notf.notf47');
        }else
            return view('notf.notf34');
    }
    public function lista_presupuestaria(){
        if(session('id'))
            {
                
            $lista=model_modificacion_presupuestaria::lista_presupuestaria();
            //dd($lista);
            return view('usuario.view_lista_presupuestaria_unidad',compact('lista'));
        }else
            return view('notf.notf34');
    }
    public function solicitud_modificacion_presupuestaria(Request $request){
        $consulta = model_presupuesto_temporal::consulta_temporal_consulta($request->id);
        return view('usuario.view_modificacion_presupuestaria_consulta',compact('consulta'));
        //dd($consulta);
    }

    public function lista_modificacion_presupuestaria(){
        if(session('id'))
        {
            $lista=model_presupuesto_temporal::lista_presupuestaria_global();
            //dd($lista);
            return view('supervisor.lista_modificacion_presupuestaria_global',compact('lista'));
        }else
            return view('notf.notf34');
    }
    //----------------------------------------------
    //----------------------------------------------

    public function asignar_modificacion(){
        if(session('id'))
        {
            //dd('llegue');
            $presupuesto_temporal = model_presupuesto_temporal::presupuesto_temporal_asignar();
            $analista = model_usuario::analista_presupuesto();
            //dd($presupuesto_temporal,$analista); //te quedste aqui, continua mañana
            return view('supervisor.view_asignar_modificacion',compact('presupuesto_temporal','analista'));
            //$asignar = model_modificacion_presupuestaria::
        }else
            return view('notf.notf34');
    }
    public function asignar_modificacion_analista(Request $request){
        if(session('id'))
        {
            //dd($request->all());
            $asignar = model_modificacion_analista::asignar_modificacion($request);
            if ($asignar) 
                return view('notf.notf80');
            else
                return view('notf.notf81');
        }else
            return view('notf.notf34');
    }
    public function lista_modificaciones(){
        if(session('id')){
            $lista = model_modificacion_analista::lista();
            return view('supervisor.lista_modificaciones',compact('lista'));
        }else
        return view('notf.notf34');
    }

    //-----------------------------------------------
    //-----------------------------------------------
    public function actualizacion_presupuestaria_global(Request $request)
    {
        if(session('id')){
        //dd($request->all());
        $id_presupuesto_temporal = 'id_presupuesto_temporal'.$request->key;
        $act = ['id_presupuesto_temporal'=>$request->$id_presupuesto_temporal];
        //dd($act);
        if($request->rechazar==1){
            $val=model_presupuesto_temporal::rechazar($act);
            if($val){
                return view('notf.notf50');
            }
        }
        if($request->aceptar==1){
            //dd($request->all());
            $actualizar = model_presupuesto::modificacion_presupuestaria($act);
            if($actualizar == true)
            {
                //dd('llegue');
                return view('notf.notf51');
            }else
                return view('notf.notf52');
        }
        }else
            return view('notf.notf34');
    }

    public function estatus_solicitud(Request $request){
        if(session('id')){
            //actualizar estatus de la solicitud de contratacion
            $actualizar_solicitud = model_solicitud::actualizar_estatus($request);
            //dd($actualizar_solicitud);
            if($actualizar_solicitud){
                if($request->estatus == 'Aceptada')
                    return view('notf.notf69');
                else
                return view('notf.notf70');
            }
        else{
            return view('notf.notf71'); // el estatus de la solicitud no fue cambiada
        }
        }else
            return view('notf.notf34');
    }
    public function analizar_solicitudes(){
        if(session('id')){
            $consultar = model_solicitud::lista_solicitudes_analizar();
            //dd($consultar);
            return view('usuario.view_analisis_solicitudes',compact('consultar'));
        }else
        return view('notf.notf34');
    }

    public function analizar_solicitudes_recibidas(){
        if(session('id')){
            $consultar = model_solicitud::lista_solicitudes_recibidas();
            //dd($consultar);
            return view('usuario.view_analisis_solicitudes_recibidas',compact('consultar'));
        }else
            return view('notf.notf34');
    }

    public function view_solicitud(Request $request){
        if(session('id')){
            $consulta=model_solicitud::verificar($request->id_solicitud);
            //dd($consulta);
            return view('usuario.view_solicitud',compact('consulta'));
        }else
            return view('notf.notf34');
    }
    public function view_solicitud_procesada(Request $request){
        if(session('id')){
            //dd($request->all());
            $tipo_contratacion = model_tipo_contratacion::tipo_contratacion();
            $modalidad_contratacion = model_modalidad_contratacion::modalidad_contratacion();
            $consulta=model_solicitud::verificar($request->id_solicitud);
            //dd($consulta->all());
            return view('usuario.view_solicitud_procesada',compact('consulta','modalidad_contratacion','tipo_contratacion'));
        }else
            return view('notf.notf34');
    }

    public function view_solicitud_verificada(Request $request){
        if(session('id')){
            //dd('llegue');
            $lista_solicitudes=model_solicitud::verificar($request->id_solicitud);
            return view('usuario.view_solicitud_verificada',compact('lista_solicitudes'));
        }else
        return view('notf.notf34');
    }

    public function asignar_numero_solicitud(Request $request){
        if(session('id')){
            //dd($request->all());
            $consulta = model_solicitud::asignar_numero_solicitud($request);
            if($consulta)
                return view('notf.notf76');
            else
                return view('notf.notf77');
        }else
            return view('notf.notf34');
    }


    public function analizar_solicitud(Request $request)
    {
        if(session('id')){
            //dd($request->all());
            $aux=model_solicitud::cambio_estatus($request);
            //dd($aux);
            if ($aux==1) 
                return view('notf.notf69');
            if ($aux==2)
                return view('notf.notf71');
        }else
            return view('notf.notf34');
    }

    public function lista_solicitudes_taquilla(){
        if(session('id')){
            //dd('llegue');
            $lista_solicitudes = model_solicitud::lista_solicitudes();
            return view('usuario.view_lista_solicitudes',compact('lista_solicitudes'));
        }else
            return view('notf.notf34');
    }

    public function lista_contrataciones_recibidas(){
        if(session('id')){
            $lista_solicitudes = model_solicitud::lista_solicitudes_recibidas();//solicitudes de contrato
            //$analistas = model_usuario::analistas_procura(4,22);
            //dd('llegue',$lista_solicitudes);
            return view('supervisor.lista_solicitudes_aceptadas',compact('lista_solicitudes','analistas'));
        }else
            return view('notf.notf34');
    }

    public function lista_solicitudes_procesadas(){
        if(session('id')){
            $lista_solicitudes = model_solicitud::lista_solicitudes_procesadas();
            //dd('llegue',$lista_solicitudes);
            return view('usuario.view_lista_solicitudes_procesadas',compact('lista_solicitudes'));
        }else
            return view('notf.notf34');
    }

    public function lista_contrataciones_aceptadas(){
        if(session('id')){
            $lista = model_solicitud::verificar_completa();
            $gerentes = model_usuario::gerente_regional();
            // dd($gerentes,$lista);
            return view('supervisor.view_asignar_solicitud_gerente',compact('lista','gerentes'));
        }else
            return view('notf.notf34');
    }
    public function lista_contrataciones_regional(){
        if(session('id')){
            $lista = model_solicitud::verificar_regional();
            $analista = model_usuario::analistas(7,22);
            //dd(session('id_perfil'),$analista,$lista);
            return view('supervisor.view_asignar_solicitud_analista',compact('lista','analista'));
        }else
            return view('notf.notf34');
    }


    public function asignar_solicitud_contrato(Request $request){
        if(session('id')){
            //dd($request->all());
            if($request->ver==1){
                $archivos=model_solicitud::verificar($request->id_solicitud);
                //dd($archivos);
                return view('supervisor.view_revisar_archivos_gerente_general',compact('archivos'));
            }
            $asignar = model_solicitud_gerente::asignar_gerente($request);
            //dd('asigne');
            if($asignar)
                return view('notf.notf72');
            else
                return view('notf.notf73');
        }else
            return view('notf.notf34');
    }

    public function asignar_solicitud_contrato_analista(Request $request){
        if(session('id')){
            //dd('llegue');
            if($request->ver==1){
                $archivos=model_solicitud::verificar($request->id_solicitud);
                return view('supervisor.view_revisar_archivos_gerente_regional',compact('archivos'));
            };
            $asignar = model_solicitud_has_analista::asignar($request);
            //dd($asignar);
            if($asignar== true)
                //return ('llegue');
                return view('notf.notf82');
            else
                return view('notf.notf83');
            //dd('pase de largo');
        }else
            return view('notf.notf34');
    }

    public function analizar_solicitudes_consultor(){
        if(session('id')){
            $lista = model_solicitud_has_analista::lista_consultor();
            //dd($lista);
            //$estatus = model_estatus::estatus(0);
            $usuario = model_usuario::analista_consultor();
            //dd($lista);
            return view('usuario.view_lista_solicitudes_consultor',compact('lista','usuario'));
        //dd('llegue');
        }else
            return view('notf.notf34');
    }

    public function objeto_empresa($id){
        $objeto = model_empresa_has_solicitud::objeto_empresa($id);
        return $objeto;
    }

    public function view_analizar_solicitud_consultor(Request $request){
        if(session('id')){
            $archivos = model_solicitud::verificar($request->id_solicitud);
            $empresas = model_empresa::empresas();

            $empresas_seleccionadas = model_empresa_has_solicitud::lista_empresas($request->id_solicitud);
            //dd($empresas_seleccionadas);
            $estatus = model_estatus::estatus($archivos[0]->id_estatus);
            //dd($estatus);
            return view('usuario.view_analizar_solicitud_consultor',compact('archivos','estatus','empresas','empresas_seleccionadas'));
        }else
            return view('notf.notf34');
    }
    public function actualizar_estatus_consultor(Request $request){
        if(session('id')){
            if ($request->estatus == 4 ){
                model_empresa_has_solicitud::empresas_seleccionadas($request);
            }
            if ($request->estatus == 7){
                $id_unidad = model_solicitud::solicitud_unidad($request->id_solicitud);
                $doc=$request->file('punto_terminado');
                $ext=strstr($request->file('punto_terminado')->getClientOriginalName(),".",false);
                $punto_adjudicacion="punto_terminado".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                $ruta='terminado'.'/'.$punto_adjudicacion;
                $request->ruta=$ruta;
                $solicitud = model_solicitud::actualizar_estatus_consultor($request);
                $id_certificado_presupuestario = model_solicitud::certificacion($request->id_solicitud);
                //dd($request->id_solicitud);
                $doc->move('terminado',$punto_adjudicacion);
                $reversar_certificacion = model_certificacion_presupuestaria::revertir($id_certificado_presupuestario);
                
                //dd($reversar_certificacion,'detente');
                if ($solicitud) {
                    return view('notf.notf84');
                }else {
                    return view('notf.notf85');
                }
            }
            if ($request->estatus == 8) {
                $id_unidad = model_solicitud::solicitud_unidad($request->id_solicitud);
                $doc=$request->file('memorandum_devuelto');
                $ext=strstr($request->file('memorandum_devuelto')->getClientOriginalName(),".",false);
                $punto_adjudicacion="memorandum_devuelto".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                $ruta='devuelto'.'/'.$punto_adjudicacion;
                $request->ruta=$ruta;
                $solicitud = model_solicitud::actualizar_estatus_consultor($request);
                $id_certificado_presupuestario = model_solicitud::certificacion($request->id_solicitud);
                //dd($request->id_solicitud);
                $doc->move('devuelto',$punto_adjudicacion);
                $reversar_certificacion = model_certificacion_presupuestaria::revertir($id_certificado_presupuestario);
                
                //dd($reversar_certificacion,'detente');
                if ($solicitud) {
                    return view('notf.notf84');
                }else {
                    return view('notf.notf85');
                }
            }
            if ($request->estatus == 9) {
                $id_unidad = model_solicitud::solicitud_unidad($request->id_solicitud);
                $doc=$request->file('punto_desierto');
                $ext=strstr($request->file('punto_desierto')->getClientOriginalName(),".",false);
                $punto_adjudicacion="punto_desierto".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                $ruta='desierto'.'/'.$punto_adjudicacion;
                $request->ruta=$ruta;
                $solicitud = model_solicitud::actualizar_estatus_consultor($request);
                $id_certificado_presupuestario = model_solicitud::certificacion($request->id_solicitud);
                //dd($request->id_solicitud);
                $doc->move('desierto',$punto_adjudicacion);
                $reversar_certificacion = model_certificacion_presupuestaria::revertir($id_certificado_presupuestario);
                
                //dd($reversar_certificacion,'detente');
                if ($solicitud) {
                    return view('notf.notf84');
                }else {
                    return view('notf.notf85');
                }
            }
            if($request->estatus==5){
                //dd($request->all());
                //dd('llegue a este punto',$request->all());
                $id_unidad = model_solicitud::solicitud_unidad($request->id_solicitud);
                //punto de adjudicación
                //--------------------------------------------------------------------
                $doc=$request->file('punto_adjudicacion');
                $ext=strstr($request->file('punto_adjudicacion')->getClientOriginalName(),".",false);
                $punto_adjudicacion="punto_adjudicacion".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                $ruta='adjudicacion'.'/'.$punto_adjudicacion;
                $request->adjudicacion=$ruta;
                $doc->move('adjudicacion',$punto_adjudicacion);
                //dd($request->carta_retencion);
                if ($request->fianza == 'NO') {
                    //carta de retenciones
                    //---------------------------------------------
                    //dd('llegue');
                    // $doc=$request->file('carta_retencion');
                    // $ext=strstr($request->file('carta_retencion')->getClientOriginalName(),".",false);
                    // $carta_retencion="carta_retencion".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                    // $ruta='retencion'.'/'.$carta_retencion;
                    // $request->carta_retencion=$ruta;
                    // $doc->move('retencion',$carta_retencion);
                }
                else{
                    //fianza laboral
                    //--------------------------------------------------------------------
                    //dd($request->all());
                    if ($request->fianza_laboral == 'SI') {
                        //dd($request->fianza_laboral);
                        $doc=$request->file('fianza_laboral_doc');
                        $ext=strstr($request->file('fianza_laboral_doc')->getClientOriginalName(),".",false);
                        $fianza_laboral="fianza_laboral".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                        $ruta='fianza_laboral'.'/'.$fianza_laboral;
                        $request->fianza_laboral_doc=$ruta;
                        $doc->move('fianza_laboral',$fianza_laboral);
                        //dd($request->fianza_laboral_doc,$ruta);
                    }else{
                        //dd('movi los archivos');
                        $doc=$request->file('retencion_laboral_doc');
                        $ext=strstr($request->file('retencion_laboral_doc')->getClientOriginalName(),".",false);
                        $fianza_laboral="retencion_laboral_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                        $ruta='retencion_laboral_doc'.'/'.$fianza_laboral;
                        $request->retencion_laboral_doc=$ruta;
                        $doc->move('retencion_laboral',$fianza_laboral);
                        //dd($request->retencion_laboral_doc);
                    }
                     //--------------------------------------------------------------------
                    //fianza de fiel cumplimiento
                    if ($request->fiel_cumplimiento_ == 'SI') {
                        $doc=$request->file('fianza_fiel_cumplomiento_doc');
                        $ext=strstr($request->file('fianza_fiel_cumplomiento_doc')->getClientOriginalName(),".",false);
                        $fianza_fiel_cumplomiento="fianza_fiel_cumplomiento_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                        $ruta='fianza_fiel_cumplomiento'.'/'.$fianza_fiel_cumplomiento;
                        $request->fianza_fiel_cumplomiento_doc=$ruta;
                        $doc->move('fianza_fiel_cumplomiento',$fianza_fiel_cumplomiento);
                    }
                    else{
                        //dd('este punto',$request->all());
                        $doc=$request->file('retencion_fiel_cumplimiento_doc');
                        //dd($request->file('retenciones_anticipo_doc'));
                        $ext=strstr($request->file('retencion_fiel_cumplimiento_doc')->getClientOriginalName(),".",false);
                        $retencion_fiel_cumplimiento_doc="retencion_fiel_cumplimiento_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                        $ruta='retencion_fiel_cumplimiento_doc'.'/'.$retencion_fiel_cumplimiento_doc;
                        $request->retencion_fiel_cumplimiento_doc = $ruta;
                        $doc->move('retencion_fiel_cumplimiento_doc', $retencion_fiel_cumplimiento_doc);
                    }

                    
                    //--------------------------------------------------------------------
                    //Fianza de Anticipo
                    if ($request->fianza_anticipo_ == 'SI') {
                        $doc=$request->file('fianza_anticipo_doc');
                        $ext=strstr($request->file('fianza_anticipo_doc')->getClientOriginalName(),".",false);
                        $fianza_anticipo_doc="fianza_anticipo_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                        $ruta='fianza_anticipo_doc'.'/'.$fianza_anticipo_doc;
                        $request->fianza_anticipo_doc=$ruta;
                        $doc->move('fianza_anticipo',$fianza_anticipo_doc);
                    }
                    // else{
                    //     //dd('este punto',$request->all());
                    //     $doc=$request->file('retenciones_anticipo_doc');
                    //     //dd($request->file('retenciones_anticipo_doc'));
                    //     $ext=strstr($request->file('retenciones_anticipo_doc')->getClientOriginalName(),".",false);
                    //     $retenciones_anticipo_doc="retenciones_anticipo_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                    //     $ruta='retenciones_anticipo'.'/'.$retenciones_anticipo_doc;
                    //     $request->retenciones_anticipo_doc = $ruta;
                    //     $doc->move('retenciones_anticipo', $retenciones_anticipo_doc);
                    // }
                    //--------------------------------------------------------------------
                    //Fianza de Buena Calidad
                    //dd($request->file('fianza_buena_calidad_doc')->getClientOriginalName());

                    //se comenta la fianza de buena calidad porque solo se verifica si tiene o no 8 marzo 2023
                    // if ($request->fianza_buena_calidad_ == 'SI') {
                    //     $doc=$request->file('fianza_buena_calidad_doc');
                    //     $ext=strstr($request->file('fianza_buena_calidad_doc')->getClientOriginalName(),".",false);
                    //     $fianza_buena_calidad="fianza_buena_calidad_doc".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                    //     $ruta='fianza_buena_calidad'.'/'.$fianza_buena_calidad;
                    //     $request->fianza_buena_calidad_doc=$ruta;
                    //     $doc->move('fianza_buena_calidad',$fianza_buena_calidad);
                    // }else{
                    //     $doc=$request->file('retenciones_buena_calidad');
                    //     $ext=strstr($request->file('retenciones_buena_calidad')->getClientOriginalName(),".",false);
                    //     $fianza_buena_calidad="retenciones_buena_calidad".'_'.$request->id_solicitud.'_'.$id_unidad.'_'.date('d-m-Y').$ext;
                    //     $ruta='retenciones_buena_calidad'.'/'.$fianza_buena_calidad;
                    //     $request->retenciones_buena_calidad=$ruta;
                    //     $doc->move('retenciones_buena_calidad',$fianza_buena_calidad);
                    // }
                    //dd('movi los archivos de retenciones');
                    //--------------------------------------------------------------------
                }
                //dd('llegue hasta aqui');
                $solicitud = model_solicitud::actualizar_estatus_consultor($request);
                if ($solicitud) {
                    return view('notf.notf84');
                }else {
                    return view('notf.notf85');
                }
            }
            $solicitud = model_solicitud::actualizar_estatus_consultor($request);
            if ($solicitud) {
                return view('notf.notf84');
            }else {
                return view('notf.notf85');
            }
        }else
        return view('notf.notf34');
    }

    public function lista_solicitudes_consultor(){
        if(session('id')){
            //dd('llegue');
            $lista=model_solicitud_has_analista::consulta_lista_consultor();
            $usuario = model_usuario::analista_consultor();
            return view('usuario.view_lista_consultor_procesadas',compact('lista','usuario'));
            //dd($lista);
        }else
            return view('notf.notf34');
    }

    public function verificar_solicitud_consultor(Request $request){
        if(session('id')){
            $archivos = model_solicitud::verificar($request->id_solicitud);
            $fianza = model_fianza::consulta_solicitud($request->id_solicitud);
            //dd($fianza);
            if (count($fianza)==0) {
                $fianza = 0;
                return view('usuario.view_verificar_solicitud_consultor',compact('archivos','fianza'));
            }else{
                return view('usuario.view_verificar_solicitud_consultor',compact('archivos','fianza'));
            }
        }else
            return view('notf.notf34');
    }

public function view_disponibilidad_presupuestaria(){
    if(session('id')){
        $anio = model_presupuesto::anio();
        $fondo = model_fondo::fondo();
        //dd($anio,$fondo);
        $consulta = '';
        return view('usuario.view_disponibilidad_presupuestaria',compact('anio','fondo','consulta'));
    }else
        return view('notf.notf34');
}
public function area_funcional($id){
    $area_funcional = model_proyecto::area_funcional_unidad($id);
    //dd($area_funcional);
    return $area_funcional;
}

    /*---------------------------------------------------------------------
    -----------------------------------------------------------------------
    generacion del pdf para la solicitud presupuestaria
    -----------------------------------------------------------------------
    -----------------------------------------------------------------------*/
}
