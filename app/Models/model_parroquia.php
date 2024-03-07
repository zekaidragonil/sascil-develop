<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_parroquia extends Model
{
    use HasFactory;
    protected $table='parroquia';
    protected $primaryKey='id';

    public function municipio()
    {
        return $this->belongsTo('App\model_municipio');
    }
    
    public function ente()
    {
        return $this->hasMany('App\model_ente');
    }

    public static function parroquia($id)
    {
        $parroquia = DB::table('parroquia')->select('id','parroquia')->where('id_municipio','=',$id)->get();
        return $parroquia;
    }
}
