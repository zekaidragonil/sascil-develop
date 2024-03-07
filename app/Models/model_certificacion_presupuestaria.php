<?php

namespace App\Models;

use App\Http\Controllers\certificacionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_presupuesto;
use App\Models\model_certificacion_presupuestaria_has_presupuesto;
use App\Models\model_certificacion_presupuestaria_analista;
use App\Models\model_unidad;

use DB;
use phpDocumentor\Reflection\Types\This;

class model_certificacion_presupuestaria extends Model
{
    use HasFactory;
    protected $table='certificacion_presupuestaria';
    protected $primaryKey='id';

    public function certificacion_presupuestaria_analista(){
        $this->hasMany('App\model_certificacion_presupuestaria_analista');
    }
    public function certificacion_presupuestaria(){
        $this->belongsTo('App\model_presupuesto');
    }

    public static function certificacion_revision()
    {
        //dd('llegue');
        $resp=DB::table('certificacion_presupuestaria as c_p')->select('pro.id as pro','numero','nombre_proyecto','nombre','pro.monto_proyecto','pre_comprometido','comprometido','saldo_disponible','estatus','c_p.created_at')->join('unidad as un','un.id','=','c_p.id_unidad')->join('proyecto as pro','pro.id','=','c_p.id_proyecto')->where ('estatus','=','En Espera')->get();
        //dd($resp);
        return $resp;
    }

    public static function certificacion()
    {
        $resp=DB::table('certificacion_presupuestaria as c_p')->select('c_p.id','c_p.nombre_solicitud','nombre_certificado','un.nombre','c_p2.id_unidad','c_p.estatus','observaciones','adjunto')->distinct('c_p.id')->leftjoin('certificacion_presupuestaria_has_presupuesto as c_p2','c_p.id','=','c_p2.id_certificacion_presupuestaria')->join('proyecto as pro','pro.id','=','c_p2.id_proyecto')->join('unidad as un','un.id','=','c_p2.id_unidad')->join('fondo as f','f.id','=','pro.id_fondo')->leftjoin('certificacion_presupuestaria_analista as c_pa','c_pa.id_certificacion_presupuestaria','=','c_p.id')->where('estatus','=','En Transito')->whereNull('c_pa.id_certificacion_presupuestaria')->get();
         //dd('llegue',$resp);
        return $resp;
    }
    public static function certificacion_id($id){
        $resp = DB::table('certificacion_presupuestaria as c_p')->select('c_p.id','monto_estimado','tasa','observaciones','tipo_moneda')->where('c_p.id','=',$id)->join('moneda as mon','mon.id','=','c_p.id_moneda')->get();
        //dd($resp);
        return $resp;
    }
    public static function certificacion_asignada()
    {

        $resp=DB::table('certificacion_presupuestaria_analista as c_pa')->select('c_pa.id_certificacion_presupuestaria','u.id','u.nombre','u.apellido','c_p.nombre_solicitud','c_pa.fecha_asignado','c_pa.fecha_respuesta','c_p.estatus','adjunto','adjunto2')->join('certificacion_presupuestaria as c_p','c_p.id','=','c_pa.id_certificacion_presupuestaria')->join('usuario as u','u.id','=','c_pa.id_usuario')->get();
        //dd('llegue',$resp);
        return $resp;

    }

    public static function revisar_certificacioines(){
        $revision= DB::table('certificacion_presupuestaria_analista as c_pa')->select('id_certificacion_presupuestaria','id_usuario','c_p.nombre_solicitud','c_p.fecha_solicitud','c_pa.fecha_asignado','c_pa.fecha_respuesta','c_p.estatus','adjunto','adjunto2')->join('certificacion_presupuestaria as c_p','c_p.id','=','c_pa.id_certificacion_presupuestaria')->where('id_usuario','=',session('id'))->get();
        return $revision;
        //dd(session('id'),$revision);
    }
    public static function revision_certificacion($verificar){
        //dd($verificar->all());
        $certificacion = DB::table('certificacion_presupuestaria as c_p')->select('id','nombre_solicitud','adjunto')->join('certificacion_presupuestaria_analista as c_pa','c_pa.id_certificacion_presupuestaria','=','c_p.id')->where('c_pa.id_usuario','=',session('id'))->where('c_pa.id_certificacion_presupuestaria','=',$verificar->id_certificacion_presupuestaria)->get();
        //dd($certificacion);
        return $certificacion;
    }

    public static function correlativo(){
        $cont = DB::table('certificacion_presupuestaria as c_p')->select('c_p.correlativo_unidad')->join('certificacion_presupuestaria_has_presupuesto as c_pp','c_p.id','=','c_pp.id_certificacion_presupuestaria')->where('id_unidad','=',session('id_unidad'))->orderBy('c_p.correlativo_unidad','desc')->limit(1)->get();
        //dd($cont);
        return $cont;
    }

    public static function solicitud_certificado($var,$conteo_unidad)//var es consulta de la tabla proyecto, var2 son los campos de la interfaz
    {
        //dd($conteo_unidad);
        //dd('a este punto',$var->all());
        $unidad = model_unidad::unidad_ind(session('id_unidad'));
        //dd($unidad);
        $nombre_unidad =$unidad[0]->nombre[0];
        //dd(session('id_unidad'),$unidad);
            //dd('entre');
            $i=0;
            $aux=str_replace('.','',$var->estimado);
            $monto = str_replace(',','.',$aux);
            $aux = str_replace('.','',$var->tasa);
            $tasa = str_replace(',','.',$aux);
            if($var->monto_certificar[$i] != '' && $var->monto_certificar[$i] > 0 ) {
                $certificado = new model_certificacion_presupuestaria();
                $certificado->correlativo_unidad = $conteo_unidad;
                $certificado->estatus = "Guardado";
                $certificado->fecha_generacion = date('Y-m-d h:m:s');
                $certificado->nombre_solicitud = 'prueba';
                $certificado->observaciones = $var->objeto;
                $certificado->id_moneda = $var->moneda;
                $certificado->tasa = floatval($tasa);
                //dd(floatval($tasa));
                $certificado->monto_estimado = floatval($monto); 
                //dd($certificado);
                $certificado->save();
                //dd($certificado);
                $cont=count(DB::table('certificacion_presupuestaria')->select('id')->get());
                
                $correlativo = model_certificacion_presupuestaria::select('id','correlativo_unidad')->orderBy('id','desc')->get()->first();
                //dd($correlativo);
                $certificado = model_certificacion_presupuestaria::find($correlativo->id);
                //dd($certificado);
                $id = substr(str_repeat(0, 4).$certificado->correlativo_unidad, - 4);
                $siglas = '';
                $explode = explode(' ',$nombre_unidad);
                $aux = model_unidad::sigls_cert(session('id_unidad'));
                //dd($aux);
                $siglas = $aux[0]->siglas_cert;
                //dd($siglas);
                //$certificado->estatus='hola';
                $certificado->nombre_solicitud = $siglas.'-'.$id.'-'.date('Y');
                $certificado->correlativo_presupuesto = $cont;
                $certificado->save();
                //dd($certificado);
                $aux = true;
                //break;
            }else{
                $aux=false;
            }
        //dd($aux);
        return $aux;
        //dd($certificado);
    }
    public static function ultima_solicitud()
    {
        $aux=DB::table('certificacion_presupuestaria')->select('correlativo_presupuesto','created_at')->get()->last();
        //dd($aux->correlativo_presupuesto);
        if ((date('Y')) == date("Y",strtotime($aux->created_at))) {
            if ($aux->correlativo_presupuesto==null) {
                return 1;
            }else
                return $aux->correlativo_presupuesto;
        }else
            return 1;
    }

    public static function ultimo_id(){
        $aux=DB::table('certificacion_presupuestaria')->select('id')->get()->last();
        //dd($aux);
        return $aux;
    }

    public static function conteo_solicitud(){
        $aux=DB::table('certificacion_presupuestaria')->select('id')->get();
        $cont = count($aux);
        return $cont;
    }

    public static function solicitud_certificacion_todas($estatus)
    {
        $aux=DB::table('certificacion_presupuestaria as c_p')->select('c_p.id','fecha_generacion','fecha_certificado','fecha_solicitud','c_p.nombre_solicitud','c_p.estatus','observaciones','fecha_solicitud','fecha_certificado','adjunto','adjunto2')->distinct('c_p.id')->leftjoin('certificacion_presupuestaria_has_presupuesto as c_p2','c_p.id','=','c_p2.id_certificacion_presupuestaria')->join('proyecto as pro','pro.id','=','c_p2.id_proyecto')->join('fondo as f','f.id','=','pro.id_fondo')->where('estatus','=',$estatus)->get();
        //dd($aux);
        return $aux;
    }


    public static function solicitud_certificacion()
    {
        $aux=DB::table('certificacion_presupuestaria as c_p')->select('c_p.id','correlativo_unidad','fecha_generacion','fecha_certificado','fecha_solicitud','c_p.nombre_solicitud','c_p.estatus','observaciones','observaciones2','fecha_solicitud','fecha_certificado','adjunto','adjunto2')->distinct('c_p.id')->leftjoin('certificacion_presupuestaria_has_presupuesto as c_p2','c_p.id','=','c_p2.id_certificacion_presupuestaria')->join('proyecto as pro','pro.id','=','c_p2.id_proyecto')->join('fondo as f','f.id','=','pro.id_fondo')->where('pro.id_unidad','=',session('id_unidad'))->get();
        //dd($aux);
        return $aux;
    }

    public static function estatus($num)//funcion para consultar el nombre y el estatus de un proyecto
    {
        $aux=DB::table('certificacion_presupuestaria as c_p')->select('nombre','estatus')->join('proyecto as pro','pro.id','=','c_p.id_proyecto')->where('pro.id','=',$num)->get();
        return $aux;
    }

    public static function revisar_certificaciones($request)
    {
        //dd('llegue',$request->all());

        $actualizar_certificado=DB::table('certificacion_presupuestaria_has_presupuesto as c_p2')->select('pre.id','pro.nombre_proyecto','pro.monto_proyecto','c_p2.pre_comprometido','c_p2.saldo_disponible','estatus','adjunto','codigo_partida')->join('clasificador_presupuestario as c_p3','c_p3.id','=','c_p2.id_clasificador_presupuestario')->join('certificacion_presupuestaria as c_p','c_p.id','=','c_p2.id_certificacion_presupuestaria')->leftjoin('presupuesto as pre','pre.id','=','c_p2.id_presupuesto')->leftjoin('proyecto as pro','pro.id','=','pre.id_proyecto')->where('c_p2.id_certificacion_presupuestaria','=',$request->id_certificacion_presupuestaria)->get();
        //dd($actualizar_certificado);
        //$actualizar_certificado=DB::table('proyecto as pro')->select('c_p.id','nombre_proyecto','pro.monto_proyecto','pre_comprometido','pre.saldo_disponible','estatus','adjunto')->join('presupuesto as pre','pro.id','=','pre.id_proyecto')->join('certificacion_presupuestaria as c_p','pro.id','=','pre.id_proyecto')->where('pro.id','=',$id_presupuesto)->get();
        //git pushdd($actualizar_certificado);
        //dd();
        return $actualizar_certificado;
    }
    public static function aprobar_certificado($aux){
        //dd($aux->all());
        //$doc=$aux->file('certificado');
        $certificado = $aux->file('certificado')->getClientOriginalName();
        $url1= 'certificaciones_presupuestarias_aprobadas/'. $certificado;
        //$doc=$aux->file('punto_cuenta');
        //$doc->move('certificaciones_presupuestarias_aprobadas', $url1);
        $certificado = model_certificacion_presupuestaria::find($aux->id);
        $certificado->adjunto2 = $url1;
        $certificado->fecha_certificado = date('Y-m-d h:m:s');
        $certificado->estatus = 'Aprobado';
        $certificado->save();
        DB::select("update certificacion_presupuestaria_analista set fecha_respuesta = '".date('Y-m-d h:m:s')."' where id_certificacion_presupuestaria = ".$aux->id);
        //dd($certificado_asignado);
        return true;
    }
    public static function actualizar_estatus_certificado($id)
    {
        //dd('llegue',$id->all());
        $presupuesto = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id_presupuesto')->where('id_certificacion_presupuestaria','=',$id->id_certificacion_presupuestaria)->get();
        //dd($presupuesto);
        $actualizar = new model_presupuesto();
        $actualizar = model_presupuesto::where('id','=',$presupuesto[0]->id_presupuesto)->first();
        //dd($actualizar);
        if ($actualizar) {
            //dd('llegue a rechazar');
            //dd($id);
            if($id->estatus == "Rechazado")
            {
                //dd('rechase');
                $aux=DB::table('certificacion_presupuestaria_has_presupuesto')->select('id','pre_comprometido','saldo_disponible')->where('id_certificacion_presupuestaria','=',$id->id_certificacion_presupuestaria)->get();
                //dd($aux);
                foreach ($aux as $key => $value) {
                    $actualizacion_c_p = model_certificacion_presupuestaria_has_presupuesto::find($value->id);
                    //dd($actualizacion_c_p);
                    $actualizacion_c_p->saldo_disponible = $actualizacion_c_p->saldo_disponible + $value->pre_comprometido;
                    $actualizacion_c_p->pre_comprometido = $actualizacion_c_p->pre_comprometido - $value->pre_comprometido;
                    $actualizacion_c_p->save();

                    $id_presupuesto = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id_presupuesto')->where('id','=',$value->id)->get();
                    //dd($id_presupuesto[0]->id_presupuesto);
                    $actualizacion_presupuesto = model_presupuesto::find($id_presupuesto[0]->id_presupuesto);
                    //dd( $actualizacion_presupuesto);
                    $actualizacion_presupuesto->saldo_disponible = $actualizacion_presupuesto->saldo_disponible + $value->pre_comprometido;
                    $actualizacion_presupuesto->pre_comprometido = $actualizacion_presupuesto->pre_comprometido - $value->pre_comprometido;
                    $actualizacion_presupuesto->save();
                    //$actualizar_presupuesto = model_presupuesto::find();
                }


                // actualizacion de la tabla certificado_presupuestario
                // ------------------------------------------------------
                // ------------------------------------------------------
                $actualizar_certificado = new model_certificacion_presupuestaria();
                $actualizar_certificado = model_certificacion_presupuestaria::find($id->id_certificacion_presupuestaria);
                //dd($actualizar_certificado,$id->id_certificacion_presupuestaria);
                $actualizar_certificado->observaciones = $id->observaciones;
                $actualizar_certificado->fecha_certificado = date('Y-m-d h:m:s');
                $actualizar_certificado->estatus = $id->estatus;
                $actualizar_certificado->save();
            }
            else
            {
                // $aux=DB::table('certificacion_presupuestaria_has_presupuesto')->select('id','pre_comprometido','saldo_disponible')->where('id_certificacion_presupuestaria','=',$id->id_certificado)->get();
                // dd($id->id_certificado,$aux,$id->id_presupuesto,'aprobe');
                // $aux=DB::table('certificacion_presupuestaria')->select('id')->where('id_presupuesto','=',$id->id_presupuesto)->where('pre_comprometido','=',$id->pre_comprometido)->get();
                //dd($id->all());
                //$cont = model_certificacion_presupuestaria::latest()->first('id');
                //dd('llegue',$cont->id);
                $ident = substr(str_repeat(0, 4).$id->id_certificacion_presupuestaria, - 4);
                //dd($cont->id,$ident);
                $actualizar_certificado = new model_certificacion_presupuestaria();
                //(count($cont));
                $actualizar_certificado = model_certificacion_presupuestaria::find($id->id_certificacion_presupuestaria);
                //$nombre_archivo=$id->file('certificado')->getClientOriginalName();
                $actualizar_certificado->observaciones2 = $id->observaciones;
                $actualizar_certificado->estatus = $id->estatus;
                $actualizar_certificado->fecha_certificado = date('Y-m-d h:m:s');
                $actualizar_certificado->nombre_certificado = 'GGPPSC'.'-'.$ident.'-'.date('Y');
                //dd($actualizar_certificado->nombre_certificado);
                //$actualizar_certificado->adjunto2 = 'certificaciones_presupuestarias_aprobadas/'.$nombre_archivo;
                $actualizar_certificado->save();
                //$actualizar->saldo_disponible = $actualizar->saldo_disponible-$id->pre_comprometido;
                $actualizar->save();
                //dd($actualizar);
            }
            return true;
        }
        return false;
    }
    public static function transferencia_presupuestaria() //lista de solicitud de transferencias presupuestarias
    {
        //dd(session('id_unidad'));
        $lista=DB::table('traspaso as tr')->select('tr.id','solicitud_traspaso','tr.id_unidad','un.nombre','concepto','memorandum_traspaso','solicitud_credito_presupuestario','estatus')->join('traspaso_analista as a_t','a_t.id_traspaso','=','tr.id')->join('unidad as un','un.id','=','tr.id_unidad')->/*where('estatus','=','Asignado')->*/where('a_t.id_usuario','=',session('id'))->get();
        //dd($lista);
        return $lista;
    }


    public static function reversar($id){//reversar certificación 
        //dd($id->all());
        $certificacion = new model_certificacion_presupuestaria();
        $certificacion = model_certificacion_presupuestaria::find($id->id);
        $certificacion->estatus='Reversado';
        $certificacion->save();
        //dd($id->id);

        $id_presupuesto = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id_presupuesto')->where('id_certificacion_presupuestaria','=',$id->id)->get();
        //dd($id->id,$id_presupuesto);
        
        foreach ($id_presupuesto as $key => $value) {
            //dd($value->id_presupuesto);
            $presupuesto =  model_presupuesto::find($value->id_presupuesto);
            //dd($presupuesto);
            //dd($presupuesto, $presupuesto->pre_comprometido-$presupuesto->pre_comprometido);
            $s_d = $presupuesto->saldo_disponible;
            $p_c = $presupuesto->pre_comprometido;
            $presupuesto->saldo_disponible = $s_d + $p_c;
            $presupuesto->pre_comprometido = $p_c - $p_c;
            $presupuesto->save();
            //dd( $presupuesto->saldo_disponible,$s_d + $p_c,$p_c - $p_c);
        }
        //dd('ver respuesta');
        //dd('prueba');
        $id_certificacion = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id','pre_comprometido')->where('id_certificacion_presupuestaria','=',$id->id)->get();
        //dd($id_certificacion);
        // $pre=DB::table('certificacion_presupuestaria_has_presupuesto')->select('pre_comprometido')->where('id_certificacion_presupuestaria','=',$id->id)->get();

        //reversar las certitifaciones en la tabla certificacion_presupuestaria_has_presupuesto
        foreach ($id_certificacion as $key => $value) {
            $act_ceri_presupuestaria = model_certificacion_presupuestaria_has_presupuesto::find($id_certificacion[$key]->id);
            //dd($act_ceri_presupuestaria,$key);

            $act_ceri_presupuestaria->saldo_disponible = $act_ceri_presupuestaria->saldo_disponible + $id_certificacion[$key]->pre_comprometido;
            //dd($act_ceri_presupuestaria->saldo_disponible);
            //dd($pre[$key]->pre_comprometido,$act_ceri_presupuestaria->saldo_disponible);
            $act_ceri_presupuestaria->pre_comprometido =$id_certificacion[$key]->pre_comprometido-  $act_ceri_presupuestaria->pre_comprometido;
            //dd($act_ceri_presupuestaria->pre_comprometido);
            //dd($act_ceri_presupuestaria->pre_comprometido);
            $act_ceri_presupuestaria->save();    
        }
        //dd('actualice model_certificacion_presupuestaria_has_presupuesto');
        return true;
        //dd('llegue',$act_ceri_presupuestaria);
    }
    public static function revertir($id){//revertir certificación (proceso de solicitud devuelto o desierto)
        //dd($id->all());
        $certificacion = new model_certificacion_presupuestaria();
        $certificacion = model_certificacion_presupuestaria::find($id);
        $certificacion->estatus='Reversado';
        //$certificacion->save();
        //dd($id->id);

        $id_presupuesto = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id_presupuesto')->where('id_certificacion_presupuestaria','=',$id)->get();
        //dd($id,$id_presupuesto);
        
        foreach ($id_presupuesto as $key => $value) {
            //dd($value->id_presupuesto);
            $presupuesto =  model_presupuesto::find($value->id_presupuesto);
            //dd($presupuesto);
            //dd($presupuesto, $presupuesto->pre_comprometido-$presupuesto->pre_comprometido);
            $s_d = $presupuesto->saldo_disponible;
            $p_c = $presupuesto->pre_comprometido;
            $presupuesto->saldo_disponible = $s_d + $p_c;
            $presupuesto->pre_comprometido = $p_c - $p_c;
            $presupuesto->save();
            //dd( $presupuesto->saldo_disponible,$s_d + $p_c,$p_c - $p_c);
        }
        //dd('ver respuesta');
        //dd('prueba');
        $id_certificacion = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id','pre_comprometido')->where('id_certificacion_presupuestaria','=',$id)->get();
        //dd($id_certificacion);
        // $pre=DB::table('certificacion_presupuestaria_has_presupuesto')->select('pre_comprometido')->where('id_certificacion_presupuestaria','=',$id->id)->get();

        //reversar las certitifaciones en la tabla certificacion_presupuestaria_has_presupuesto
        foreach ($id_certificacion as $key => $value) {
            $act_ceri_presupuestaria = model_certificacion_presupuestaria_has_presupuesto::find($id_certificacion[$key]->id);
            //dd($act_ceri_presupuestaria,$key);

            $act_ceri_presupuestaria->saldo_disponible = $act_ceri_presupuestaria->saldo_disponible + $id_certificacion[$key]->pre_comprometido;
            //dd($act_ceri_presupuestaria->saldo_disponible);
            //dd($pre[$key]->pre_comprometido,$act_ceri_presupuestaria->saldo_disponible);
            $act_ceri_presupuestaria->pre_comprometido =$id_certificacion[$key]->pre_comprometido-  $act_ceri_presupuestaria->pre_comprometido;
            //dd($act_ceri_presupuestaria->pre_comprometido);
            //dd($act_ceri_presupuestaria->pre_comprometido);
            $act_ceri_presupuestaria->save();    
        }
        //dd('actualice model_certificacion_presupuestaria_has_presupuesto');
        return true;
        //dd('llegue',$act_ceri_presupuestaria);
    }
    public static function consulta_solicitud($id){
        $act_solic = DB::table('certificacion_presupuestaria')->select('id','correlativo_unidad','nombre_solicitud')->where('id','=',$id->id_certificacion_presupuestaria)->get();
        return $act_solic;
    }
    public static function actualizar_estatus_solicitud ($id,$url){//funcion para actualizar la solicitud de certificacion presupuestaria  
        //dd($id);
        $actualizar = model_certificacion_presupuestaria::find($id);
        $actualizar->adjunto=$url;
        $actualizar->fecha_solicitud= date('Y-m-d h:m:s');
        $actualizar->estatus='En Transito';
        $actualizar->save();
        return true;
    }
    public static function llave_presupuestaria($id){
        //dd($id);

        $certificar = DB::table('certificacion_presupuestaria as c_p')->select('c_p.nombre_certificado','c_p.nombre_solicitud','un.nombre','pro.proyecto_presupuestario','nombre_proyecto','f.fondo','cl_p.codigo_partida','c_pp.monto','c_pp.pre_comprometido','c_pp.saldo_disponible')->join('certificacion_presupuestaria_has_presupuesto as c_pp','c_p.id','=','c_pp.id_certificacion_presupuestaria')->join('unidad as un','un.id','=','c_pp.id_unidad')->join('clasificador_presupuestario as cl_p','cl_p.id','=','c_pp.id_clasificador_presupuestario')->join('proyecto as pro','pro.id','=','c_pp.id_proyecto')->join('presupuesto as pre','pre.id','=','c_pp.id_presupuesto')->join('fondo as f','f.id','=','pre.id_fondo')->where('c_p.id','=',$id)->get();
        //dd($certificar);
        return $certificar;
    }
    public static function contar(){
        $c_p=DB::table('certificacion_presupuestaria')->select('id')->get();
        $cont=count($c_p);
        return $cont;
    }
    public static function certificacion_aprobada(){
        $certificacion= DB::table('certificacion_presupuestaria as c_p')->select('c_p.id','nombre_certificado')->leftjoin('certificacion_presupuestaria_has_presupuesto as c_p_p','c_p_p.id_certificacion_presupuestaria','=','c_p.id')->leftjoin('solicitud as so','so.id_certificacion_presupuestaria','=','c_p.id')->whereNull('so.id_certificacion_presupuestaria')->where('c_p.estatus','=','Aprobado')->where('c_p_p.id_unidad','=',session('id_unidad'))->distinct()->get();
        //dd('llegue',$certificacion);
        return $certificacion;
    }
}
