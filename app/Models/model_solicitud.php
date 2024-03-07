<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\model_solicitud_has_analista;
use App\Models\model_certificacion_presupuestaria;
use App\Models\model_instrumento_legal_has_empresa;
use App\Models\model_tipo_contratacion;
use App\Models\model_modalidad_contratacion;
use DB;
class model_solicitud extends Model
{
    protected $table="solicitud";
    protected $primaryKey='id';

    public function proyecto()
    {
        return $this->hasMany('App\model_proyecto');
    }
    public function unidad()
    {
        return $this->BelongsTo('App\model_unidad');
    }
    public function solicitud_has_usuario(){
        return $this->hasMany('App\model_solicitud_has_usuario');
    }

    public function proyecto_solicitud()
    {
        return $this->hasMany('App\model_proyecto_solic');
    }
    public function solicitud_has_gerente(){
        return $this->hasMany('App\model_solicitud_has_gerente');
    }
    public function estatus()
    {
        return $this->belongsTo('App\model_estatus');
    }

    public function carta_retencion(){
        return $this->hasMany('App\model_carta_retencion');
    }
    public function fianza(){
        return $this->hasMany('App\model_fianza');
    }

    public function revision_instrumento_legal(){
        return $this->hasMany('App\model_revision_instrumento_legal');
    }

    public static function id_solicitud()
    {
        $id_solicitud=DB::table('solicitud')->count();
        return $id_solicitud;
    }

    public static function val_solicitud($numero_punto)
    {
        //dd($numero_punto);
        $aux=DB::table('solicitud')->select('numero_punto_cuenta')->where('numero_punto_cuenta','=',$numero_punto)->get();
        //dd(count($aux));
        if(count($aux)==1)
            return true;
        else
            return false;
    }

    public static function guardar_solicitud($solicitud,$id_proyecto,$url)
    {
        //dd($solicitud->id_certificacion);
        $aux = DB::table('solicitud as so')->select('so.id')->where('so.id_unidad','=',session('id_unidad'))->get();
        $cont = count($aux);
        //dd($cont);
        $var = new model_solicitud();
        //dd($var);
        $var->numero_punto_cuenta = $solicitud->numero_punto;
        $var->correlativo_unidad = $cont+1;
        $var->punto_cuenta = $url["url1"];
        $var->fecha_punto = $solicitud->fecha_punto;
        $var->numero_control = $solicitud->numero_control;
        $var->certificacion_presupuestaria = $url["url2"];
        $var->estimacion_costo = $url["url3"];
        $var->espesificaciones_tecnicas = $url["url4"];
        $var->forma_018 = $url["url5"];
        $var->matriz_tecnica = $url["url6"];
        $var->memorandum = $url["url7"];
        $var->bienes_nacionales = $url["url8"];
        $var->opinion_asho = $url["url9"];

        $var->estatus='POR REVISION';
        $var->descripcion = $solicitud->descripcion;
        $var->id_unidad=session('id_unidad');
        $var->id_proyecto=$id_proyecto[0]->id;
        $var->id_certificacion_presupuestaria=$solicitud->id_certificacion;
        $unidad = DB::table('unidad')->select('nombre')->where('id','=',session('id_unidad'))->get();
        $nombre_unidad = $unidad[0]->nombre;
        $siglas = model_unidad::siglas(session('id_unidad')); //sigas de la unidad

        //dd($cont+1);
        $id = substr(str_repeat(0, 4).$cont+1, - 4);
        $var->numero_solicitud = $siglas[0]->siglas.'-'.$id.'-'.date('Y');
        //dd($var->numero_solicitud);
        $var->fianza_buena_calidad = null;
        $var->save();
        return 'true';
    }
    public static function mostrar_solicitud($id)
    {
        $mostrar=DB::table('solicitud as so')->select('so.id','numero_punto_cuenta','estatus','un.nombre as unidad','en.nombre as ente','so.created_at as fecha')->join('unidad as un','un.id','=','so.id_unidad')->join('ente as en','en.id','=','un.id_ente')->where('id_unidad','=',$id)->get();
        //dd($mostrar);
        return $mostrar;
    }
    public static function verificar($id)
    {
        //dd('llegue al modelo');
        $solicitud=DB::table('solicitud as so')->select('so.id','numero_solicitud','numero_asignado','numero_punto_cuenta','punto_cuenta','certificacion_presupuestaria','estimacion_costo','espesificaciones_tecnicas','forma_018','matriz_tecnica','memorandum','bienes_nacionales','opinion_asho','estatus','punto_estatus','id_estatus','es.nombre_estatus')->leftjoin('estatus as es','es.id','=','id_estatus')->where('so.id','=',$id)->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function lista_solicitudes_consultor($id)
    {
        //dd('llegue al modelo');
        $solicitud=DB::table('solicitud as so')->select('so.id','numero_solicitud','numero_asignado','numero_punto_cuenta','punto_cuenta','certificacion_presupuestaria','estimacion_costo','espesificaciones_tecnicas','forma_018','matriz_tecnica','memorandum','estatus','id_estatus','es.nombre_estatus')->leftjoin('estatus as es','es.id','=','id_estatus')->where('so.id','=',$id)->get();
        //dd($solicitud);
        return $solicitud;
    }


    public static function lista_solicitudes_unidad()
    {
        //dd('verificar solicitud');
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','so.id','numero_punto_cuenta','so.estatus','un.nombre','so.created_at as fecha')->join('unidad as un','un.id','=','so.id_unidad')->join('certificacion_presupuestaria as c_p','c_p.id','=','so.id_certificacion_presupuestaria')->where('un.id','=',session('id_unidad'))->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function lista_solicitudes_numeradas()
    {
        //dd('verificar solicitud');
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','estatus','un.nombre','so.created_at as fecha','fecha_recepcion','fecha_numeracion')->join('unidad as un','un.id','=','so.id_unidad')->join('solicitud_has_gerente as s_g','so.id','=','s_g.id_solicitud')->join('ente as en','en.id','=','un.id_ente')->distinct()->get();
        //dd($solicitud,'llegue');
        return $solicitud;
    }

    public static function lista_solicitudes_regional()
    {
        //dd('verificar solicitud');
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','so.id','estatus','numero_punto_cuenta','estatus','un.nombre','so.created_at as fecha','fecha_numeracion','fecha_recepcion')->join('unidad as un','un.id','=','so.id_unidad')->join('solicitud_has_gerente as s_g','so.id','=','s_g.id_solicitud')->join('ente as en','en.id','=','un.id_ente')->whereNotNull('numero_asignado')->where('so.estatus','=','Recibido')->orWhere('so.estatus','=','asignado')->where('id_usuario','=',session('id'))->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function verificar_lista()
    {
        //dd('verificar solicitud');
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','so.id','estatus','numero_punto_cuenta','estatus','un.nombre','so.created_at as fecha')->join('unidad as un','un.id','=','so.id_unidad')->join('ente as en','en.id','=','un.id_ente')->whereNotNull('numero_asignado')->distinct('id')->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function verificar_completa()
    {
        //dd('verificar solicitud');
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','so.id','estatus','numero_punto_cuenta','estatus','un.nombre','so.created_at as fecha')->join('unidad as un','un.id','=','so.id_unidad')->join('ente as en','en.id','=','un.id_ente')->leftjoin('solicitud_has_gerente as s_g','s_g.id_solicitud','=','so.id')->whereNotNull('numero_asignado')->whereNull('s_g.id_solicitud')->distinct('id')->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function verificar_regional()
    {
        //dd(session('id'));
        $solicitud=DB::table('solicitud as so')->select('so.id','so.correlativo_unidad','so.numero_solicitud','so.numero_asignado','so.id','estatus','numero_punto_cuenta','estatus','un.nombre','so.created_at as fecha')->join('unidad as un','un.id','=','so.id_unidad')->join('solicitud_has_gerente as s_g','s_g.id_solicitud','=','so.id')->leftjoin('solicitud_has_analista as s_a','s_a.id_solicitud','=','so.id')->whereNull('s_a.id_solicitud')->where('s_g.id_usuario','=',session('id'))->get();
        //dd($solicitud);
        return $solicitud;
    }

    public static function cambio_estatus($id)
    {
        $solicitud = new model_solicitud();
        $solicitud = model_solicitud::where('id',$id->id_solicitud)->first();
        if ($id->estatus=='Recibido') {
            $solicitud->estatus = 'Recibido';
            $solicitud->fecha_recepcion = now();
            $solicitud->save();
            return 1;
        }else
        {
            $solicitud->estatus = 'No Recibido';
            $solicitud->fecha_recepcion = now();
            $solicitud->save();
            return 2;
        }
    }
    public static function actualizar_estatus($solc)
    {
        //dd($solc->estatus);
        $solicitud = new model_solicitud();
        $solicitud = model_solicitud::where('id',$solc->id_solicitud)->first();
        $solicitud->estatus = $solc->estatus;
        $solicitud->observaciones = $solc->observaciones;
        $solicitud->save();
        return true;
    }
    
    public static function lista_contrataciones_solicitadas(){
        $consulta = DB::table('solicitud as so')->select('so.id as id','numero_punto_cuenta','so.estatus','un.nombre','so.created_at as fecha_solicitud','so.numero_control','so.fecha_punto','numero_solicitud')->join('unidad as un','un.id','=','so.id_unidad')->where('so.estatus','=','En espera')->get();
        //dd('llegue',$consulta);
        return $consulta;
    }

    public static function lista_solicitudes_analizar(){
        $consulta = DB::table('solicitud as so')->select('so.id as id','so.estatus','un.nombre','so.created_at as fecha_solicitud','numero_solicitud','so.numero_punto_cuenta','so.numero_asignado')->join('unidad as un','un.id','=','so.id_unidad')->where('so.estatus','=','POR REVISION')->get();
        //dd($consulta);
        return $consulta;
    }

    public static function lista_solicitudes_recibidas(){
        $consulta = DB::table('solicitud as so')->select('so.id as id','so.estatus','un.nombre','so.created_at as fecha_solicitud','numero_solicitud','so.numero_punto_cuenta','so.numero_asignado')->join('unidad as un','un.id','=','so.id_unidad')->where('so.estatus','=','Recibido')->whereNull('so.numero_asignado')->get();
        //dd($consulta);
        return $consulta;
    }

    public static function lista_solicitudes(){
        $consulta = DB::table('solicitud as so')->select('so.id as id','so.estatus','un.nombre','so.created_at as fecha_solicitud','numero_solicitud','so.numero_punto_cuenta','so.numero_asignado','fecha_recepcion')->join('unidad as un','un.id','=','so.id_unidad')->where('estatus','!=','Asignado')->get();
        //dd($consulta);
        return $consulta;
    }

    public static function lista_solicitudes_procesadas(){
        $consulta = DB::table('solicitud as so')->select('so.id as id','so.estatus','un.nombre','so.created_at as fecha_solicitud','so.numero_control','so.fecha_punto','numero_solicitud','numero_asignado','so.updated_at as fecha_procesado')->join('unidad as un','un.id','=','so.id_unidad')->where('so.estatus','=','Recibido')->orWhere('estatus','=','Asignado')->get();
        //dd($consulta);
        return $consulta;
    } 

    public static function asignar_numero_solicitud($solicitud){
        //dd('llegue al modelo',$solicitud->all());
        
        $tipo_contratacion = model_tipo_contratacion::consulta($solicitud->tipo_contratacion);
        $modalidad_contratacion = model_modalidad_contratacion::consulta($solicitud->modalidad_contratacion);

        $asignar = model_solicitud::find($solicitud->id_solicitud);
        $aux = count(DB::table('solicitud')->select('id')->whereNotNull('numero_asignado')->get());
        $cont = substr(str_repeat(0, 4).$aux+1, - 5);

        $siglas = DB::table('unidad')->select('siglas')->where('id','=',$asignar->id_unidad)->get();
        $asignar->numero_asignado = $modalidad_contratacion[0]->siglas.'-'.$tipo_contratacion[0]->siglas.'-GGP-'.$siglas[0]->siglas.'-'.$cont.'-'.date('Y');
        $asignar->fecha_numeracion= now();
        $asignar->id_tipo_contratacion = $solicitud->tipo_contratacion;
        $asignar->id_modalidad_contratacion = $solicitud->modalidad_contratacion;
        $asignar->save();
        return true;
    }
    public static function actualizar_estatus_consultor($data){
        //xdd($data->all());
        $aux=DB::table('estatus as es')->select('es.nombre_estatus')->where('es.id','=',$data->estatus)->get();

        $actualizar = model_solicitud::find($data->id_solicitud);
        $actualizar->id_estatus = $data->estatus;
        $actualizar->punto_estatus = $data->adjudicacion;
        $actualizar->fecha_punto_estatus = $data->fecha_punto_adjudicacion;
        $actualizar->numero_punto_cuenta_estatus = $data->numero_punto_cuenta_adjudicacion;
        $actualizar->numero_control_punto_estatus = $data->numero_control_adjudicacion;
        //dd($actualizar->punto_estatus);
        $actualizar->estatus = $aux[0]->nombre_estatus;
        //dd($actualizar->estatus);
        $actualizar->fianza_buena_calidad = $data->fianza_buena_calidad_;
        $actualizar->save();
        $id_instrumento = DB::table('instrumento_legal')->select('id')->orderBy('id','desc')->first();
        if($id_instrumento != null)
        {
            $empresa_has_instrumento = new model_instrumento_legal_has_empresa();
            $empresa_has_instrumento->id_instrumento_legal = $id_instrumento->id;
            $empresa_has_instrumento->id_empresa = $data->id_empresa;
            $empresa_has_instrumento->fecha_registro = date('Y-m-d h:m:s');
            $empresa_has_instrumento->save();
        }
        if($data->fianza == 'NO'){
            // $carta_r = new model_carta_retencion();
            // $carta_r->carta_retencion = $data->carta_retencion;
            // $carta_r->id_solicitud = $data->id_solicitud;
            //$carta_r->save();
        }
        else{
            //dd($data->all());
            //dd($data->retencion_fiel_cumplimiento_doc);
            if ($data->fianza == 'SI') {
                if ($data->fianza_laboral == 'SI') {
                    $fianza = new model_fianza();
                    $fianza->tipo_fianza = 'Fianza Laboral';
                    $fianza->numero_fianza = $data->n_laboral;
                    $fianza->monto_fianza = floatval(str_replace('.','',$data->monto_laboral));
                    $fianza->fecha_caducidad = $data->fecha_caducidad_laboral;
                    $fianza->fianza = $data->fianza_laboral_doc;
                    $fianza->id_solicitud = $data->id_solicitud;
                    $fianza->save();
                }else{
                    $carta_r = new model_carta_retencion();
                    //dd($data->retencion_fiel_cumplimiento_doc);
                    $carta_r->carta_retencion = $data->retencion_laboral_doc;
                    $carta_r->id_solicitud = $data->id_solicitud;
                    $carta_r->observaciones =$data->obj_retenciones_fiel_cumplimiento;
                    $carta_r->save();
                }
                 //fianza de fiel cumplimiento
                if ($data->fiel_cumplimiento_ == 'SI') {
                    $fianza = new model_fianza();
                    $fianza->tipo_fianza = 'Fianza de Fiel Cumplimiento';
                    $fianza->numero_fianza = $data->n_fiel_cumplimineto;
                    $fianza->monto_fianza = floatval(str_replace('.','',$data->monto_fiel_cumplimiento));
                    $fianza->fecha_caducidad = $data->fecha_caducidad_fiel_cumplimiento;
                    $fianza->fianza = $data->fianza_fiel_cumplomiento_doc;
                    $fianza->id_solicitud = $data->id_solicitud;
                    $fianza->save();
                }else{
                    $carta_r = new model_carta_retencion();
                    $carta_r->carta_retencion = $data->retencion_fiel_cumplimiento_doc;
                    $carta_r->id_solicitud = $data->id_solicitud;
                    $carta_r->observaciones = $data->obj_retenciones_fiel_cumplimiento;
                    $carta_r->save();
                }
                if ($data->fianza_anticipo_ == 'SI') {
                    //fianza de anticipo
                    $fianza = new model_fianza();
                    $fianza->tipo_fianza = 'Fianza de Anticipo';
                    $fianza->numero_fianza = $data->n_anticipo;
                    $fianza->monto_fianza = floatval(str_replace('.','',$data->monto_anticipo));
                    $fianza->fecha_caducidad = $data->fecha_caducidad_anticipo;
                    $fianza->fianza = $data->fianza_anticipo_doc;
                    $fianza->id_solicitud = $data->id_solicitud;
                    $fianza->save();
                }
                // else{
                //     $carta_r = new model_carta_retencion();
                //     $carta_r->carta_retencion = $data->retenciones_anticipo_doc;
                //     $carta_r->id_solicitud = $data->id_solicitud;
                //     $carta_r->save();
                // }
                
                // if ($data->fianza_buena_calidad_ == 'SI') {
                //     $fianza = new model_fianza();
                //     $fianza->tipo_fianza = 'Fianza de Buena Calidad';
                //     $fianza->numero_fianza = $data->n_buena_calidad;
                //     $fianza->monto_fianza = floatval(str_replace('.','',$data->monto_buena_calidad));
                //     $fianza->fecha_caducidad = $data->fecha_buena_calidad_caducidad;
                //     $fianza->fianza = $data->fianza_buena_calidad_doc;
                //     $fianza->id_solicitud = $data->id_solicitud;
                //     $fianza->save();
                // }else{
                //     $carta_r = new model_carta_retencion();
                //     dd($data->all());
                //     $carta_r->carta_retencion = $data->retenciones_buena_calidad;
                //     $carta_r->id_solicitud = $data->id_solicitud;
                //     $carta_r->save();
                // }
            }
        }

        $act=DB::update('update solicitud_has_analista set fecha_respuesta = "'.now().'",id_estatus = '.$data->estatus.' where id_solicitud = '.$data->id_solicitud.' and id_usuario = '.session('id'));
        return true;
    }
    public static function certificacion($id_solicitud){
        $id_certificacion=model_solicitud::find($id_solicitud);
        return $id_certificacion->id_certificacion_presupuestaria;
    }
    public static function solicitud_unidad($id){
        $unidad = DB::table('solicitud as so')->select('id_unidad')->where('so.id','=',$id)->get();
        return $unidad[0]->id_unidad;
    }
    public static function solicitud($estatus){
        $solicitud = DB::table('solicitud_has_analista as s_a')->select('so.id','estatus','un.nombre','numero_asignado')->join('solicitud as so','so.id','=','s_a.id_solicitud')->join('unidad as un','un.id','=','so.id_unidad')->where('s_a.id_estatus','=','5')->whereNull('verificado')->get();
            return $solicitud;
        //dd($solicitud);
    }

    public static function solicitud_asignada(){
        $lista = DB::table('solicitud_has_analista as s_a')->select('so.id','so.estatus','un.nombre as unidad','numero_asignado','us.nombre','us.apellido')->join('solicitud as so','so.id','=','s_a.id_solicitud')->join('unidad as un','un.id','=','so.id_unidad')->join('usuario as us','us.id','=','s_a.id_usuario')->where('s_a.id_estatus','=','5')->whereNotNull('verificado')->get();
            return $lista;
        //dd($solicitud);
    }
    public static function solicitud_asignada_analista(){
        //dd(session('id_unidad'),session('id'));
        $lista = DB::table('solicitud_has_analista as s_a')->select('so.id','so.estatus','un.nombre as unidad','numero_asignado','numero_solicitud','so.created_at as fecha_solicitud','id_certificacion_presupuestaria')->join('solicitud as so','so.id','=','s_a.id_solicitud')->join('unidad as un','un.id','=','so.id_unidad')->join('usuario as us','us.id','=','s_a.id_usuario')->whereNull('s_a.id_estatus')->where('s_a.id_usuario','=',session('id'))->get();
        //$auxiliar = DB::table('certificacion_presupuestaria_has_presupuesto')->select('pre_comprometido')->where('id_certificacioni_presupuestaria','=',$lista);
        //dd($lista);
        return $lista;
    }

    public static function solicitud_juridico($data){
        $solicitud = DB::table('solicitud')->select('id','numero_asignado','estatus','id_estatus','punto_cuenta','certificacion_presupuestaria','espesificaciones_tecnicas','forma_018','matriz_tecnica','estimacion_costo','memorandum','bienes_nacionales','opinion_asho','observaciones','punto_estatus')->where('id','=',$data->id_solicitud)->get();
        return $solicitud;
    } 
}
