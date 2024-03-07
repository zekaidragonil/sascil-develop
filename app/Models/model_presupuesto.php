<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_proyecto;
use DB;
class model_presupuesto extends Model
{
    use HasFactory;
    protected $table='presupuesto';
    protected $primaryKey='id';

    public function fondo()
    {
        return $this->BelongsTo('App\model_fondo');
    }
    public function presupuesto_temporal(){
        return $this->hasMany('App\model_presupuesto_temporal');
    }

    public function instrumento_legal()
    {
        return $this->BelongsTo('App\model_proyecto');
    }
    public function partisa_presupuestaria()
    {
        return $this->BelongsTo('App\model_clasificador_presupuestaria');
    }
    public function certificacion_presupuestaria()
    {
        return $this->hasMany('App\model_certificacion_presupuestaria');
    }

    public static function consulta_presupuesto($id)
    {
        //dd($id);
        $consulta=DB::table('presupuesto')->select('id')->where('id_unidad','=',$id)->get();
        //dd($consulta);
        if(count($consulta)>0)
            return true;
        else
            return false;
    }
    public static function consulta_partida($id) //consulta de partidas presupuestarias asignada al proyecto
    {
        //dd(intval($id));
        $consulta_partidas=DB::table('presupuesto as p')->select('id_proyecto','codigo_partida','descripcion','p.monto')->join('clasificador_presupuestario as c_p','c_p.id','=','p.id_clasificador_presupuestario')->join('proyecto as pro','pro.id','=','p.id_proyecto')->where('id_proyecto','=',intval($id))->get();
        //$consulta_partidas;
        //dd($consulta_partidas);
        return $consulta_partidas;
    }

    public static function calculo_monto($id)//funcion para verificar que el total de las partidas presupuestarias es igual al proyecto
    {
        $monto_presupuesto=DB::table('presupuesto')->where('id_proyecto','=',$id)->sum('monto');
        $monto_proyecto = model_proyecto::consulta_monto_proyecto($id);
        //dd($monto_proyecto->monto_proyecto);
        if($monto_presupuesto < $monto_proyecto->monto_proyecto)
        {
            //dd('verdadero');
            return true;
        }
        else
        {
            //dd('falso');
            return false;
        }
    }
    public static function asignacion_presupuestaria ($data)
    {

        //dd('llegue',$data->all());

        $aux=DB::table('presupuesto')->select('id')->where('id_fondo','=',$data->id_fondo)->where('id_proyecto','=',$data->id_proyecto)->where('id_clasificador_presupuestario','=',$data->id_clasificador_presupuestario)->where('id_unidad','=',$data->id_unidad)->get();
        if(count($aux)===0)//la convinacion no existe y se procede a guardarla en base de datos
        {
            $asignacion= new model_presupuesto();

            $asignacion->id_fondo = $data->fondo;
            $asignacion->id_clasificador_presupuestario = $data->id_clasificador_presupuestario;
            $asignacion->id_proyecto = $data->id_proyecto;
            $asignacion->id_unidad = $data->id_unidad;
            $asignacion->monto = doubleVal(str_replace('.','',$data->monto));
            $asignacion->saldo_disponible = doubleVal(str_replace('.','',$data->monto));
            $asignacion->save();
            return true;
        }else
        {
            return false;// la convinacion existe
        }
    }

    public static function partidas($id) //consulta de partidas presupuestarias por proyecto
    {
        $partidas=DB::table('presupuesto as p')->select('c_p.id','codigo_partida')->join('clasificador_presupuestario as c_p','c_p.id','=','p.id_clasificador_presupuestario')->where('p.id_proyecto','=',$id)->get();
        //dd($partidas);
        return $partidas;
    }
    public static function partidas_asignadas($id)
    {
        //dd($id['id_unidad']);
        $existe=DB::table('presupuesto')->select('id_clasificador_presupuestario','id_proyecto','id_unidad')->where('id_unidad','=',$id['id_unidad'])->where('id_clasificador_presupuestario','=',$id['id_clasificador_presupuestario'])->where('id_proyecto','=',$id['id_proyecto'])->get();
        //dd($existe);
        if(count($existe)>0)
            return false; //significa que ya existe la partida asignada a este proyecto y a esta unidad
        else
            return true; //significa que no existe la partida asignada a este proyecto y aesta unidad y sera guardada
    }
    public static function monto($id,$proyecto) //la consulta devuelve el saldo de las partidas seleccionadas
    {
        //dd($id,$proyecto);
        $aux = DB::table('presupuesto')->select('saldo_disponible')->where('id_clasificador_presupuestario','=',$id)->where('id_proyecto','=',$proyecto)->get();
        $saldo=number_format($aux[0]->saldo_disponible,2,',','.');
        //dd($saldo);

        return $saldo;
    }
    public static function guardar_prespuesto($presupuesto1)
    {
        //dd($presupuesto1);
        $presupuesto = new model_presupuesto;
        $presupuesto->id_fondo = $presupuesto1->id_fondo;
        $presupuesto->monto = $presupuesto1->monto;
        $presupuesto->saldo_disponible =  $presupuesto1->saldo;
        $presupuesto->id_proyecto =$presupuesto1->id_proyecto;
        $presupuesto->id_unidad =$presupuesto1->id_unidad;
        $presupuesto->id_clasificador_presupuestario = $presupuesto1->id_clasificador_presupuestario;
        $presupuesto->fecha_presupuesto = $presupuesto1->anio;
        $presupuesto->save();
        return true;
    }

    //traspaso presupuestario entre proyectos y partidas presupuestarias
    public static function solicitud_proyecto() //solicitud de transferencias
    {
        $proyecto=DB::table('presupuesto as pre')->select('pre.id_proyecto','pro.nombre_proyecto','proyecto_presupuestario')->distinct('pre.id_proyecto')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('unidad as un','un.id','=','pre.id_unidad')->where('pre.id_unidad','=',session('id_unidad'))->get(); //proyectos asociados a la unidad 
        //dd($proyecto);
        return $proyecto;
    }
    //consulta del presupuesto por unidad administrativa para ser modifcado
    public static function modificacion_presupuestaria($id){//consulta presupuestaria
        //dd($id);
        $presupuesto_temporal = model_modificacion_presupuestaria::find($id['id_presupuesto_temporal']);
        $presupuesto_temporal->estatus = 'Aprobado';
        $presupuesto_temporal->save();
        //dd($presupuesto_temporal);
        $modificacion = DB::table('presupuesto_temporal as p_t')->select('monto_asignar_bs','id_clasificador_presupuestario')->where('id_modificacion_presupuestaria','=',$id['id_presupuesto_temporal'])->get();
        //dd($presupuesto_temporal,$modificacion);

        for ($i=0; $i < count($modificacion); $i++) { 
            $presupuesto = new model_presupuesto();
            $presupuesto->id_fondo = $presupuesto_temporal->id_fondo;
            $presupuesto->monto = $modificacion[$i]->monto_asignar_bs;
            $presupuesto->saldo_disponible = $modificacion[$i]->monto_asignar_bs;
            $presupuesto->id_proyecto = $presupuesto_temporal->id_proyecto;
            $presupuesto->id_unidad = $presupuesto_temporal->id_unidad;
            $presupuesto->id_clasificador_presupuestario = $modificacion[$i]->id_clasificador_presupuestario;
            //dd($presupuesto);
            $presupuesto->save();
        }
        
        //dd($id['id_presupuesto']);

        // $modificar = new model_modificacion_presupuestaria();
        // $modificar->id_fondo = $presupuesto_temporal->id_fondo;
        // $modificar->id_clasificador_presupuestario = $presupuesto_temporal->id_clasificador_presupuestario;
        // $modificar->id_proyecto = $presupuesto_temporal->id_proyecto;
        // $modificar->monto = $presupuesto_temporal->monto;
        // $modificar->punto_cuenta = $presupuesto_temporal->punto_cuenta;
        // $modificar->estatus = 'Aprobado';
        // $modificar->save();
        return true;
    }
    public static function llave_presupuestaria($id){
        //dd($id);
        $llave = DB::table('presupuesto as pre')->select('pre.id_proyecto','pro.nombre_proyecto','c_p.codigo_partida','c_p.descripcion','pre.saldo_disponible')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->where('id_proyecto','=',$id)->get();
        return $llave;
    }
    public static function verificar($aux){
        //dd($aux->all());
        $consulta = DB::table('presupuesto')->select('id')->where('id_unidad','=',session('id_unidad'))->where('id_proyecto','=',$aux->id_proyecto)->where('id_clasificador_presupuestario','=',$aux->id_clasificador_presupuestario)->get();
        return $consulta;
    }

    public static function actualizar_modificacion($request){
        
        //este proceso es para cuando el presupuesto modificado halla sido aprobado o rechazado (funcion para el admisnitrador de presupuesto pendiente)
    }

    public static function actualizar_traspaso_temporal($request){
        //dd($request->all());
        for ($i=0; $i < count($request->id_proyecto_cedente) ; $i++) {
            $presupuesto_origen = model_presupuesto::find($request->id_presupuesto_cedente[$i]);
            $presupuesto_origen->saldo_disponible = doubleval($request->monto_disponible[$i]);
            $presupuesto_origen->save();
            //dd('actualice');
        }
        return true;
    }
    public static function reversar_traspaso($id){
        $proceso = DB::table('proceso_traspaso')->select('presupuesto_origen','monto_solicitado')->where('id_traspaso','=',$id)->get();
        //dd($id_proceso);
        foreach ($proceso as $key => $value) {
            //dd($id_proceso[$key]->id);
            $actualizar = model_presupuesto::find($proceso[$key]->presupuesto_origen);
            $actualizar->saldo_disponible = $actualizar->saldo_disponible + $proceso[$key]->monto_solicitado;
            $actualizar->save();
        }
        return true;
    }
    public static function aprobar_traspaso($id){
        $proceso = DB::table('proceso_traspaso')->select('presupuesto_destino','monto_total')->where('id_traspaso','=',$id)->get();
        foreach ($proceso as $key => $value) {
            $actualizar = model_presupuesto::find($proceso[$key]->presupuesto_destino);
            $actualizar->saldo_disponible = $proceso[$key]->monto_total;
            $actualizar->save();
        }
        return true;
    }
    public static function ultima_anio(){
        $anio = DB::table('presupuesto')->select('id','fecha_presupuesto')->orderBy('id','desc')->limit(1)->where('fecha_presupuesto','=',date('Y'))->get();
        //dd($anio);
        return $anio;
    }
    public static function anio(){
        $anio = DB::table('presupuesto')->select('fecha_presupuesto')->distinct('fecha_presupuesto')->get();
        return $anio;
    }
    public static function consulta_anio($anio,$unidad){
        $consulta= DB::table('presupuesto as pre')->select('un.nombre','pro.nombre_proyecto','pro.nombre_subproyecto','f.fondo','c_l.codigo_partida','pre.monto','pre.saldo_disponible','pre.fecha_presupuesto')->join('fondo as f','f.id','=','pre.id_fondo')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('unidad as un','un.id','=','pre.id_unidad')->join('clasificador_presupuestario as c_l','c_l.id','=','pre.id_clasificador_presupuestario')->where('fecha_presupuesto','=',$anio)->where('pre.id_unidad','=',$unidad)->get();
        return $consulta;
    }

    //proceso de traspaso entre unidades
    public static function unidad_traspaso($id){
        $unidades=DB::table('presupuesto as pre')->select('un.id','un.nombre')->join('fondo as fon','fon.id','=','pre.id_fondo')->join('unidad as un','un.id','=','pre.id_unidad')->where('pre.id_fondo','=',$id)->distinct('un.id')->get();
    return $unidades;
    }
    //proceso de traspaso entre unidades
    public static function partida_cedente($id){
        $partidas = DB::table('presupuesto as pre')->select('pre.id','c_p.codigo_partida','c_p.descripcion')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->where('pre.id_proyecto','=',$id)->distinct('pre.id_clasificador_presupuestario')->where('saldo_disponible','>',0)->get();
        //dd($partidas);
        return $partidas;
    }
    //proceso de traspaso entre unidades
    public static function monto_disponible($id){
        $monto_disponible = DB::table('presupuesto as pre')->select('saldo_disponible')->where('pre.id','=',$id)->get();
        //dd('llegue',$monto_disponible);
        return $monto_disponible;
    }
    public static function reporte($data){
        $cont=count($data->columnas);
        $consulta = '';
        for ($i=0; $i < $cont; $i++) {
            if($i == ($cont-1)){
                $consulta = $consulta.$data->columnas[$i];
            }else{
                $consulta =$consulta.$data->columnas[$i].',';
            }
        }

        //dd($consulta);
        $prueba = str_replace('"','',$consulta);
        //dd($prueba);
        $repoprte = DB::select('select 
        '.$consulta.'
        from presupuesto as pres 
        join fondo as fn on fn.id = id_fondo
        join proyecto as pro on pro.id = id_proyecto
        join unidad as un on un.id = pres.id_unidad
        join clasificador_presupuestario as c_l on c_l.id = id_clasificador_presupuestario
        where pres.pre_comprometido is not null
        ');
        dd($repoprte);
    }

    public static function consulta_disponibilidad($data){
        //dd($data->all());
        $consulta=DB::table('presupuesto as pre')->select('pre.id',
        't_u.id_presupuesto_cedente',
        'c_p.codigo_partida',
        'monto',
        'saldo_disponible',
        'monto_cedido',
        'pre_comprometido',
        'causado',
        'fecha_presupuesto',
        'fn.fondo',
        'pro.proyecto_presupuestario',
        'un.nombre')->join('clasificador_presupuestario as c_p','c_p.id','=','pre.id_clasificador_presupuestario')->join('unidad as un','un.id','=','pre.id_unidad')->join('proyecto as pro','pro.id','=','pre.id_proyecto')->join('fondo as fn','fn.id','=','pre.id_fondo')->leftJoin('traspaso_unidades as t_u','t_u.id_presupuesto_cedente','=','pre.id')->where('pro.id','=',$data->id_proyecto)->get();
        return $consulta;
    }
}
