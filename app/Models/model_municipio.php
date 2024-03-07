<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_municipio extends Model
{
    use HasFactory;
    protected $table='municipio';
    protected $paimaryKey='id';


    public function estado()
    {
        return $this->BelongsTo('App\model_estado');
    }
    public function parroquia()
    {
        return $this->hasMany('App\model_parroquia');
    } 
    public static function municipio($id)
    {   
        $municipio = DB::table('municipio')->select('id','municipio')->where('id_estado','=',$id)->get();
        return $municipio;
    }
}
