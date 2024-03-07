<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_alianza;
use App\Models\model_alianza_has_analista;
use App\Models\model_alianza_has_empresa;
use App\Models\model_usuario;
use App\Models\model_empresa;
use App\Models\model_alianza_has_gerente;
use App\Models\model_modalidad_contratacion;
use App\Models\model_tipo_contratacion;
use App\Models\model_certificacion_presupuestaria;
use App\Models\model_estatus;

class alianzaController extends Controller
{
    public function solicitar_alianza()
    {        
        if (session('id')) {
            $cantidad=0;
            return view('usuario.view_solicitar_alianza',compact('cantidad'));
        }else{
            return view('notf.notf34');
        }
    }

    public function solicitud_alianza1(Request $request)
    {
        if (session('id')) {
            $cantidad=$request->cantidad;
            return view('usuario.view_solicitar_alianza',compact('cantidad'));
        }else{
            return view('notf.notf34');
    }
    }

    public function solicitud_alianza2(Request $request)
    {
    if (session('id')) {
        //dd($request->all());
        $doc1=$request->file('punto_cuenta');
        $ext=strstr($request->file('punto_cuenta')->getClientOriginalName(),".",false);
        $punto_cuenta="solicitud_alianza/"."punto_cuenta_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        $doc1->move('solicitud_alianza', $punto_cuenta);

        // $doc2=$request->file('e_costo');
        // $ext=strstr($request->file('e_costo')->getClientOriginalName(),".",false);
        // $e_costo="solicitud_alianza/"."e_costo_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        // $doc2->move('solicitud_alianza', $e_costo);

        $doc3=$request->file('e_tecnicas');
        $ext=strstr($request->file('e_tecnicas')->getClientOriginalName(),".",false);
        $e_tecnicas="solicitud_alianza/"."e_tecnicas_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        $doc3->move('solicitud_alianza', $e_tecnicas);

        // $doc4=$request->file('forma_018');
        // $ext=strstr($request->file('forma_018')->getClientOriginalName(),".",false);
        // $forma_018="solicitud_alianza/"."forma_018_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        // $doc4->move('solicitud_alianza', $forma_018);

        $doc5=$request->file('m_tecnica');
        $ext=strstr($request->file('m_tecnica')->getClientOriginalName(),".",false);
        $m_tecnica="solicitud_alianza/"."m_tecnica_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        $doc5->move('solicitud_alianza', $m_tecnica);

        $doc6=$request->file('memorandum');
        $ext=strstr($request->file('m_tecnica')->getClientOriginalName(),".",false);
        $memorandum="solicitud_alianza/"."memorandum_".date('d-m-Y')."_".session("id_ente").'_'.session('id_unidad').'_'.$ext;
        $doc6->move('solicitud_alianza', $memorandum);

        $alz=model_alianza::solicitud($request,$punto_cuenta,$e_tecnicas,$m_tecnica,$memorandum);
        if($alz==true){
            return view('notf.notf56');
        }else{
            return view('notf.notf57');
        }
    }else{
        return view('notf.notf34');
    }
    }
    public function consultar_alianza(){
    if(session('id')){
        $consulta = model_alianza::consultar_alianza();
        //dd($consulta);
        return view('usuario.view_consultar_alianza',compact('consulta'));
    }else
    return view('notf.notf34');
    }
    public function consulta_dcumentacion_aliaza_unidad(Request $request){
        $documento_alianza = model_alianza::alianza($request->id_alianza);
        //dd($documento_alianza);
        return view('usuario.view_consulta_alianza_unidad',compact('documento_alianza'));
    }

    public function solicitud_contratacion_alianza(){
    //dd('llegue');
    if(session('id')){
        $alianza = model_alianza::alianza_unidad();
        $certificacion = model_certificacion_presupuestaria::certificacion_aprobada();
        //dd($certificacion);
        return view('usuario.view_solicitud_contrato_alianza',compact('alianza','certificacion'));
    }else
    return view('notf.notf34');
    }

    public function lista_alianzas_asignadas(){
    if(session('id')){
        $lista_asignada = model_alianza_has_analista::consulta();
        //dd($lista_asignada);
        return view('usuario.view_lista_alianza_asignada',compact('lista_asignada'));
    }else
    return view('notf.notf34');
    }
    //-------------------------------
    //lista de solicitudes para asignar
    //--------------------------------
    public function lista_alianzas_solicitadas_asignar(){
    if(session('id')){
        $consultar = model_alianza::consulta_alianza_procura();
        $usuario = model_usuario::analistas('ANALISTA',session('id_unidad'));
        //dd($consultar,$usuario);
        return view('supervisor.view_alianza',compact('consultar','usuario'));
    }else
        return view('notf.notf34');
    }
    //-------------------------------
    //lista de solicitudes para asignar
    //--------------------------------

    public function asignar_alianza(Request $request){
    if(session('id')){
        //dd($request->all());
        $asignar_alianza = model_alianza_has_analista::asignar($request);
        if($asignar_alianza ==true){
            return view('notf.notf64');
        }
    }else
        return view('notf.notf34');
    }

    public function alianza(Request $request){
        if(session('id')){
            $alianza=model_alianza::alianza($request->id);
            return view('usuario.verificar_alianza',compact('alianza'));
        }else
        return view('notf.notf34');
    }

    public function analisis_alianza()
    {
        if(session('id')){
            //dd('llegue');
            $analisar= model_alianza_has_analista::analisis_alianza();
            return view('usuario.view_analisis_alianza',compact('analisar'));
        }else
            return view('notf.notf34');
    }

    public function lista_alianzas(){
        if(session('id')){
            //dd('llegue');
            $lista_alianzas = model_alianza::lista_alianza();
            return view('usuario.view_lista_alianzas',compact('lista_alianzas'));
        }else
            return view('notf.notf34');
    }

    public function lista_alianzas_recepcion(){
        if(session('id')){
            $lista_alianzas = model_alianza::lista_alianza_recepcion();
            //dd('llegue',$lista_alianzas);
            return view('usuario.view_lista_alianzas_recepcion',compact('lista_alianzas'));
        }else
            return view('notf.notf34');
    }

    public function lista_alianzas_solicitadas(){
        if(session('id')){
            $lista_alianza=model_alianza::lista_solicitud();
            //dd('llegue');
            return view('usuario.lista_alianzas_solicitadas',compact('lista_alianza'));
        }else
            return view('notf.notf34');
    }

    public function revision_solicitud_alianza(Request $request){//revision de solucitud en taquilla
        if(session('id')){
            //dd($request->all());
            $revisar = model_alianza::consultar_alianza_id($request->id);
            return view('usuario.revisar_solicitud_alianza',compact('revisar'));
            //dd($revisar);
        }else
            return view('notf.notf34');
    }

    public function revision_solicitud_alianza_recepcion(Request $request){
        if(session('id')){
            //dd($request->id);
            $revisar = model_alianza::consultar_alianza_id($request->id);
            //dd($revisar);
            return view('usuario.revisar_solicitud_alianza_resepcion',compact('revisar'));
        }else
            return view('notf.notf34');
    }

    public function revisar_solicitud_alianza_recepcion(Request $request){
        //dd('llegue');
    }

    public function revisar_solicitud_alianza(Request $request){//asignar empresas a las solicitud de alianza
        if(session('id')){
            $empresa = model_empresa::empresa();
            //$modalidad_contratacion = model_modalidad_contratacion::modalidad_contratacion();
            //$tipo_contratacion = model_tipo_contratacion::tipo_contratacion();
            //dd($empresa);
            $actualizar_alianza = model_alianza::consultar_alianza_id($request->id_alianza);
            return view('usuario.view_actualizar_solicitud_lianza',compact('actualizar_alianza','empresa',));
        }else
            return view('notf.notf34');
    }
    public function actualizar_solicitud_alianza(Request $request){
        if(session('id')){
            $actualizar_alianza= model_alianza::actualizar_solicitud($request);
            if($actualizar_alianza){
                return view('notf.notf65');
            }
            else{
                return view('notf.notf66');
            }
        }else
            return view('notf.notf34');
    }
    // proceso de alianzas para la recepcion
    public function lista_alianzas_recibidas(){
        if(session('id')){
            $alianza = model_alianza::consulta_alianza_recibida();
            //dd($alianza);
            return view('usuario.lista_alianzas_recibidas',compact('alianza'));
        }else
            return view('notf.notf34');
    }

    public function lista_alianzas_recibidas_analizar(){
        if(session('id')){
            $alianza = model_alianza::consulta_alianza_asignar();
            //dd($alianza);
            return view('usuario.lista_alianzas_numerar',compact('alianza'));
        }else
            return view('notf.notf34');
    }

    public function asignar_numero_alianza(Request $request)
    {  
        if(session('id')){
            $consulta = model_alianza::alianza($request->id_alianza);
            $buton = $request->buton;
            //dd($request->all(),$consulta);
            $tipo_contratacion = model_tipo_contratacion::tipo_contratacion();
            $modalidad_contratacion = model_modalidad_contratacion::modalidad_contratacion();
            return view('usuario.view_asignar_numero_alianza',compact('consulta','tipo_contratacion','modalidad_contratacion','buton'));
        }else
            return view('notf.notf34');
    }

    public function ver_alianza_asignada(Request $request)
    {  
        if(session('id')){
            //dd('controler');
            $consulta = model_alianza::alianza_asignada($request->id_alianza);
            //dd($consulta);
            return view('usuario.view_asignar_numero_alianza',compact('consulta','tipo_contratacion','modalidad_contratacion'));
        }else
            return view('notf.notf34');
    }

    public function numero_alianza(Request $request){
        if(session('id')){
            $asignar = model_alianza::asignar_alianza($request);
            if($asignar)
                return view('notf.notf74');
            else
                return view('notf.notf75');
            //dd($alianza);
        }else
            return view('notf.notf34');
    }

    public function lista_alianzas_procesadas(){
        if(session('id')){
            //dd('llegue');
            $lista_alianzas=model_alianza::consulta_alianza_procesadas();
            return view('usuario.view_listas_alianzas_procesadas',compact('lista_alianzas'));
        }else
            return view('notf.notf34');
    }
    //----------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------
    
    public function lista_alianzas_aceptadas(){
        if(session('id')){
            $lista_alianza = model_alianza::consulta_alianza_transito();
            //dd($lista_alianza);
            return view('usuario.lista_alianzas_solicitadas',compact('lista_alianza'));
        }else
            return view('notf.notf34');
    }

    // funcion para asignar las alianzas a los gerentes regionales
    //----------------------------------------------------------------------------------------
    public function lista_asignar_alianza(){
        if(session('id')){
            $analistas= model_usuario::analistas(6,22);//22 es el id de la unidad de procura
            //dd($analistas);
            $alianza = model_alianza::consulta_alianza_procura();//esta funcion asigna las alianzas a los gerentes regionales
            //dd($alianza);
            return view('supervisor.view_asignar_alianza',compact('alianza','analistas'));
        }else
            return view('notf.notf34');
    }
    //----------------------------------------------------------------------------------------

    public function lista_asignar_alianza_gerente(){
        if(session('id')){
            $analistas= model_usuario::analistas(6,22);//22 es el id de la unidad de procura
            $alianza = model_alianza::consulta_alianza_procura();//esta funcion asigna las alianzas a los gerentes regionales
            //dd($alianza);
            return view('supervisor.view_asignar_alianza',compact('alianza','analistas'));
        }else
            return view('notf.notf34');
    }
    

    public function lista_alianzas_asignadas_analista (){
        if(session('id')){
            //dd('llegue');
            $lista = model_alianza_has_analista::asignadas();
            //dd($lista);
            return view('supervisor.view_alianzas_asignadas',compact('lista'));
        }
        else
            return view('notf.notf34');
    }
    //asignar alianzas los gerentes regionales de procura

    public function lista_asignar_alianza_analista(){
        if(session('id')){
            $analistas= model_usuario::analistas(7,22);//22 es el id de la unidad de procura y 7 es el perfil del consultor en procura
            //dd('llegue');
            $alianza = model_alianza::consulta_alianza_procura_analista();//esta funcion asigna las alianzas a los gerentes regionales
            //dd($alianza);
            return view('supervisor.view_asignar_alianza_analista',compact('alianza','analistas'));
        }else
            return view('notf.notf34');
    }
   // Asignar alianzas a los gerentes 
    public function asignar_alianza_gerente(Request $request){
        if(session('id')){
            if($request->analista==null){
                return view('notf.notf99');
            }
            if($request->buscar==1){
                $consulta = model_alianza::alianza($request->id_alianza);
                return view('supervisor.view_ver_alianza_gerente',compact('consulta'));
            }else{
                $asignar = model_alianza_has_gerente::asignar_alianza_gerente($request);
            //dd($asignar);
            if($asignar)
                return view('notf.notf98');
                //return view('supervisor.view_alianzas_asignadas',compact('lista'))
            }
        }
        else
            return view('notf.notf34');
    }

    //asignar alianzas a analistas
    public function asignar_alianza_analista(Request $request)
    {
        if(session('id')){
            //dd('llegue',$request->all());
            if ($request->consulta == 1) {
                $consulta = model_alianza::alianza($request->id_alianza);
                return view('supervisor.view_ver_alianza_gerente_regional',compact('consulta'));
                //dd($consulta);
            }
            $asignar = model_alianza_has_analista::asignar_alianza_analista($request);
            //dd($asignar);
            if($asignar)
                return view('notf.notf86');
                //return view('supervisor.view_alianzas_asignadas',compact('lista'));
        }
        else
            return view('notf.notf34');
    }

    public function lista_alianza_consultor_analizar(){
        $analizar = model_alianza_has_analista::analizar_alianza();
        //dd($analizar);
        return view('usuario.view_consulta_alianza_consultor',compact('analizar'));
    }
    public function analizar_alianza_consultor(Request $request){
        $consultar_alianza = model_alianza::consultar_alianza_cosultor($request->id_alianza);
        //dd($consultar_alianza->all());
        $estatus_solicitud = model_estatus::estatus(null);
        //dd($estatus_solicitud);

        $empresa_adjudicar = model_alianza_has_empresa::empresas($request->id_alianza);
        $empresas = model_empresa::empresas($request->id_alianza);
        

        return view('usuario.view_analizar_alianza_consultor',compact('consultar_alianza','estatus_solicitud','empresas','empresa_adjudicar'));
    }

    public function actualizar_estatus_alianza(Request $request){
       //dd($request->all());
        $actualizar_alianza = model_alianza::actualizar_estatus($request);
        if($actualizar_alianza)
            return view('notf.notf87');
        else
            return view('notf.notf88');
    }

    public function consultar_alianza_asignada_consultor(Request $request){
        $consultar_alianza = model_alianza::consultar_alianza_cosultor($request->id_alianza);
        return view('usuario.view_consultar_alianza_consultor',compact('consultar_alianza'));
    }
}