<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\model_certificacion_presupuestaria;
use App\Models\model_certificacion_presupuestaria_has_presupuesto;
use App\Models\model_certificacion_presupuestaria_analista;
use App\Models\model_fondo;
use App\Models\model_moneda;
use App\Models\model_presupuesto;
use App\Models\model_traspaso;
use App\Models\model_usuario;
use App\Models\model_proceso_traspaso;
use App\Models\model_traspaso_analista;
use App\Models\model_proyecto;
use App\Models\model_unidad;
use DB;
use Luecano\NumeroALetras\NumeroALetras;
class certificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_revision()
    {
        if(session('id'))
        {

            $certificacion=model_certificacion_presupuestaria::certificacion_revision();
            //dd($certificacion);
            return view('supervisor.certificacion_presupuestaria',compact('certificacion',$certificacion));
        }else
            return view('notf.notf34');

    }
     public function index()
    {
        if(session('id'))
        {
            //dd('llegue');
            $certificacion=model_certificacion_presupuestaria::certificacion();
            $analistas= model_usuario::analistas(4,16);//16 es el id de la unidad de presupuesto
            //dd($analistas);
            return view('supervisor.certificacion_presupuestaria',compact('certificacion','analistas'));
        }else
            return view('notf.notf34');
    }
    public function lista_certificacion_asignadas(){
        //dd('llegue');
        if(session('id'))
        {
            //dd('llegue');
            $certificacion=model_certificacion_presupuestaria::certificacion_asignada();
            //$analistas= model_usuario::analistas('ANALISTA',16);//16 es el id de la unidad de presupuesto
            //dd($certificacion);
            return view('supervisor.certificacion_asignada',compact('certificacion'));
        }else
            return view('notf.notf34');
    }
    
    // lista de certificaciones a revisar por los analistas de presupuesto
    public function revisar_certificaciones(){
        if(session('id')){
            //dd('llegue');
            $revision = model_certificacion_presupuestaria::revisar_certificacioines();
            //dd($revision);
            return view('usuario.revision_certificacion',compact('revision'));
        }else
            return view('notf.notf34');
    }


    public function editar_estatus_certificado(Request $request)
    {
        if(session('id'))
        {
            //dd($request->all());
            $certificacion=$request->id_certificacion;
            $analista=$request->analista;
            //dd($request->all());
            $asignar=model_certificacion_presupuestaria_analista::asignar($certificacion,$analista);
            //dd($asignar);
            if($asignar==true){
               return view('notf.notf60');
            }
            else{
               return view('notf.notf61');
            }
        }else
            return view('notf.notf34');
    }
    public function aprobar_certificacion(Request $request){
        if(session('id'))
        {
            //dd($request->file('certificado'));
            $aux=model_certificacion_presupuestaria::aprobar_certificado($request);
            $doc=$request->file('certificado');
            $nombre_solicitud = $request->file('certificado')->getClientOriginalName();
            $url1= 'certificaciones_presupuestarias_aprobadas/'. $nombre_solicitud;
            //dd($doc);
            $doc->move('certificaciones_presupuestarias_aprobadas', $url1);
            if($aux==true){
                return view('notf.notf62');
            }else{
                return view('notf.notf63');
            }
        }else
            return view('notf.notf34');
    }

    public function actualizar_solicitud_certificado(Request $request)
    {
        if(session('id'))
        {
            //dd('llegue',$request->all());
            if ($request->aprobar==1) {
                $id_certificado=$request->id_certificacion_presupuestaria;
                return view('usuario.subir_certificado',compact('id_certificado')); 
            }
            if($request->generar_formato==1)
            {
                //dd($request->all());
                $aux = model_usuario::gerente('GERENCIA GENERAL DE PLANIFICACIÓN, PRESUPUESTO Y SEGUIMIENTO Y CONTROL');
                $gerente_pre=['nombre' => $aux[0]->nombre,'apellido' => $aux[0]->apellido,'cedula'=> $aux[0]->cedula];
                $num = model_certificacion_presupuestaria::contar();
                $ident = substr(str_repeat(0, 4).$request->id_certificacion_presupuestaria, - 4);
                //dd($ident);
                $dom = "GGPPSC-".$ident.'-'.date('Y');
                //dd($dom);
                $certificar = model_certificacion_presupuestaria::llave_presupuestaria($request->id_certificacion_presupuestaria);
                $total = 0;
                foreach($certificar as $key => $value){
                    $total = $total+$value->pre_comprometido;
                }
                //dd($total);
                $data=model_certificacion_presupuestaria::certificacion_id($request->id_certificacion_presupuestaria);
                //dd($data[0]->tipo_moneda,$data[0]->monto_estimado);
                //dd($gerente_pre['nombre'],model_certificacion_presupuestaria::consulta_solicitud($request));
                //dd($request->id_certificado);
                //dd($data[0]->monto_estimado/$data[0]->tasa);
                //$area = model_unidad::unidad_ind();
                $pdf = \PDF::loadView('certificacion_pdf',compact('dom','aux','gerente_pre','certificar','data','total'));
                return $pdf->download($dom.'.pdf');
            }
        }else
            return view('notf.notf34');

        if(session('id'))
        {
            //dd($request->all());
            if($request->estatus=='Revisado')

            {
                //dd($request->id_certificacion_presupuestaria,'llegue');
                if($request->id_certificacion_presupuestaria)
                {
                    //dd($request->all());
                    //$archivo=$request->file('certificado')->getClientOriginalName();
                    //$doc=$request->file('certificado');
                    //$doc->move('certificaciones_presupuestarias_aprobadas',$archivo);
                    $respuesta=model_certificacion_presupuestaria::actualizar_estatus_certificado($request);
                    //dd($respuesta);
                    if($respuesta)
                        return view('notf.notf27');
                    else
                        return view('notf.notf28');
                }
            }else
            {
                //dd('llegue',$request);
                $respuesta=model_certificacion_presupuestaria::actualizar_estatus_certificado($request);
                return view('notf.notf29');
            }
            //dd(session('id_unidad'),$request);
        }else
            return view('notf.notf34');
    }
    public function solicitud_transferencia(){ // funcion para desplegar los proyectos para transferir presupuesto
        if(session('id'))
        {
            $fondo = model_fondo::fondo();
            $consulta = model_presupuesto::solicitud_proyecto();
            return view('usuario.view_traspaso',compact('consulta','fondo'));
        }else
        return view('notf.notf34');
    }
    public function solicitar_traspaso(Request $request){
        //dd('llegue al controlador',$request->all());
        if(session('id'))
        {
            if($request->doc == 1)
            {
                //dd($request->all());
                $cont=count($request->monto_disponible_receptor);
                $suma = 0;

                for ($i=0; $i < $cont; $i++) { 
                    $suma = $suma + floatval($request->monto_ceder[$i]);
                }
                $formatter = new NumeroALetras();
                $total=$formatter->toWords($suma);
                //dd($suma);
                $aux = model_unidad::unidad_ind(session('id_unidad'));
                $aux1 = model_unidad::sigls_cert(session('id_unidad'));
                $numero_s = DB::table('traspaso')->select('id')->where('id_unidad','=',session('id_unidad'))->get();
                $n_solicitud = str_pad(count($numero_s)+1, 5, "0", STR_PAD_LEFT).'-'.$aux1[0]->siglas_cert.'-'.date('Y');
                $unidad=$aux[0]->nombre;
                $nombre = 'formato_traspaso_'.date('Y');
                //return view('solicitud_traspaso_pdf',compact('request','total','suma','cont','unidad','n_solicitud'));
                $pdf = \PDF::loadView('solicitud_traspaso_pdf',compact('request','total','suma','cont','unidad','n_solicitud'));
                return $pdf->setPaper('a2','landscape')->download('solicitud_traspaso_pdf');
            }else{
                //dd($request->all());
                
                $traspaso = model_traspaso::traspaso($request);
                $solicitud_traspaso = model_proceso_traspaso::solicitud_traspaso($request);
                $actualizar = model_presupuesto::actualizar_traspaso_temporal($request);

                //$ultimo = model_traspaso::ultimo_traspaso();

                if($traspaso and $actualizar and $solicitud_traspaso )
                    return view('notf.notf41');
            }
        }else
            return view('notf.notf34');
    }

    public function asignar_traspaso_analista(Request $request){
        if(session('id')){
            //dd($request->all());
            // if($request->but1==1){
            //     //dd($request->all());
            //     $solicitud_traspaso=model_proceso_traspaso::consulta_traspaso($request->id);
            //     //dd($solicitud_traspaso);
            //     return view('supervisor.view_solicitud_traspaso_gerente',compact('solicitud_traspaso'));
            // }
            //dd('llegue',$request->all());
            $asignar = model_traspaso_analista::asignar_traspaso_analista($request->all());
            if ($asignar) 
                return view('notf.notf78');
            else
                return view('notf.notf79');
        }else
            return view('notf.notf34');
    }

    public function transferencia_presupuestaria() //vista de transferencia entre partidas partidas
    {
        if(session('id'))
        {
            //dd('llegue al punto');
            $lista=model_certificacion_presupuestaria::transferencia_presupuestaria();
            //dd($lista);
            return view('supervisor.transferencia_presupuestaria',compact('lista'));
        }else
            return view('notf.notf34');
    }

    public function proceso_traspaso(Request $request){
        //dd($request->all());
        if(session('id'))
        {
            if($request->aceptar=='1'){
                $solicitud = model_traspaso::consultar_traspaso($request->id);
                return view('usuario.view_actualizar_traspaso',compact('solicitud'));
            }
            if ($request->aceptar=='0') {
                //dd('llegue a rechazar');
                $solicitud = model_traspaso::consultar_traspaso($request->id);
                return view('usuario.view_rechazar_traspaso',compact('solicitud'));
                //Actualizar estatus de solicitud de traspaso "Rechazar";
                //$rechazar = model_traspaso::rechazar($request->id); //rechazar transferencia presupuestaria
                //return view('notf.notf42');
            }
        }else
            return view('notf.notf34');
    }

    public function lista_cert_reversar()
    {
        if(session('id'))
        {
            $consulta=model_certificacion_presupuestaria::solicitud_certificacion('Reversado');
            //dd($consulta);
            return view('supervisor.lista_rev_certificacion',compact('consulta'));
        }else
            return view('notf.notf34');
    }
    public function cert_reversar(){
        if(session('id'))
        {
            //dd('llegue');
            $consulta=model_certificacion_presupuestaria::solicitud_certificacion_todas('Guardado');
            //dd($consulta);
            return view('supervisor.lista_rev_certificacion',compact('consulta'));
        }else
            return view('notf.notf34');
    }


    public function reversar_certificacion(Request $request)
    {
        if(session('id')){
        //dd('llegue',$request->all());
        $aux=model_certificacion_presupuestaria::reversar($request);
            if($aux)
            {
                return view('notf.notf39');
            }
            else{
                return view('notf.notf40');
            }
        }else
            return view('notf.notf34');
    }
    public function lista_poa(){
        if (session('id')) {
            $anio = model_proyecto::anio();
            //dd($anio);
            $unidad = model_unidad::unidad_administrativa();
            return view('supervisor.view_consulta_poa',compact('anio','unidad'));
        }else
            return view('notf.notf34');
    }
    public function poa($anio,$unidad){
        //dd($anio,$unidad);
        $presupuesto = model_presupuesto::consulta_anio($anio,$unidad);
        return $presupuesto;
    }
}