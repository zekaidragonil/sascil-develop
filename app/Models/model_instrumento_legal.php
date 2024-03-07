<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_solicitud;
use App\Models\model_estatus;
use DB;
class model_instrumento_legal extends Model
{
    use HasFactory;
    protected $table='instrumento_legal';
    protected $primaryKey='id';
    public function estatus()
    {
        return $this->BelongsTo('App\model_estatus');
    }

    public function acta_instrumento_legal()
    {
        return $this->BelongsTo('App\model_acta_instrumento_legal');
    }

    public function unidad()
    {
        return $this->BelongsTo('App\model_unidad');
    }

    public function instrumento_legal_has_empresa()
    {
        return $this->hasMany('App\model_instrumento_legal_has_empresa');
    }

    public function tipo_instrumento_legal()
    {
        return $this->BelongsTo('App\model_tipo_instrumento_legal');
    }

    public function moneda()
    {
        return $this->BelongsTo('App\model_moneda');
    }

    public function avance()
    {
        return $this->BelongsTo('App\model_avance');
    }

    public function instrumento_legal_financiamiento()
    {
        return $this->hasMany('App\model_instrumento_legal_financiamiento');
    }

    public function fianza_intrumento_legal()
    {
        return $this->hasMany('App\model_fianza_intrumento_legal');
    }

    public function anticipo()
    {
        return $this->BelongsTo('App\model_anticipo');
    }

    public static function guardar($data){
        //dd($data->all());
        $instrumento = new model_instrumento_legal();
        $instrumento->numero = $data->numero_contrato;
        $instrumento->fecha_suscripcion = $data->fecha_suscripcion;
        $instrumento->fecha = now();
        $doc=$data->file('instrumento_legal');
        $instrumento_legal = $data->file('instrumento_legal')->getClientOriginalName();
        $url= 'instrumento_legal/'. $instrumento_legal;
        $doc->move('instrumento_legal', $url);
        $instrumento->pdf = $url;
        $instrumento->fecha_estatus = now();
        $instrumento->objeto = $data->objeto;
        $instrumento->plazo_entrega = $data->plazo_entrega;
        
        $monto= doubleval(str_replace('.','',$data->monto_contrato));
        $instrumento->monto = $monto;
        //dd($monto);
        $instrumento->id_estatus = $data->estatus;
        $instrumento->id_tipo_instrumento_legal = 1;
        $instrumento->id_moneda = $data->moneda;
        $instrumento->id_avance = 1;
        $instrumento->id_anticipo = 1;
        $instrumento->id_solicitud = $data->id_solicitud;
        $instrumento->save();

        $estatus = model_estatus::find($data->estatus);
        //dd($estatus->nombre_estatus);
        $solicitud = model_solicitud::find($data->id_solicitud);
        //dd($solicitud);
        $solicitud->id_estatus = $data->estatus;
        $solicitud->estatus = $estatus->nombre_estatus;
        $solicitud->save();
        return true;
    }
    public static function consulta(){
        $instrumento = DB::table('instrumento_legal as i_l')->select('i_l.id','fecha_suscripcion','fecha as fecha_registro','pdf','plazo_entrega','monto','tipo_moneda','nombre_estatus','tipo')->join('estatus as es','es.id','=','i_l.id_estatus')->join('tipo_instrumento_legal as ti_l','ti_l.id','=','i_l.id_tipo_instrumento_legal')->join('moneda as m','m.id','=','i_l.id_moneda')->get();
        return $instrumento;
    }
    
    public static function consulta_unidad ($id){
        //dd($id);
        $instrumento = DB::table('instrumento_legal as i_l')->select('i_l.id','numero','fecha_suscripcion','fecha as fecha_registro','pdf','plazo_entrega','monto','tipo_moneda','nombre_estatus','tipo')->join('estatus as es','es.id','=','i_l.id_estatus')->join('tipo_instrumento_legal as ti_l','ti_l.id','=','i_l.id_tipo_instrumento_legal')->join('moneda as m','m.id','=','i_l.id_moneda')->join('solicitud as sol','sol.id','=','i_l.id_solicitud')->where('sol.id_unidad','=',$id)->get();
        //dd($instrumento[0]);
        return $instrumento;
    }
    public static function instrumento_legal($id){// instrumento legal por unidad
        $instrumentos = DB::table('instrumento_legal as i_l')->select('i_l.id as id_inst','sol.id as id_sol','numero')->join('solicitud as sol','sol.id','=','i_l.id_solicitud')->where('sol.id_unidad','=',$id)->get();
        //dd($instrumentos);
        return $instrumentos;
    }
    public static function instrumento($id){//instrumento legal por identificador
        $instrumento = DB::table('instrumento_legal as i_l')->select('monto')->where('id','=',$id)->get();
        //dd($id, $instrumento);
        return $instrumento;
    }
}