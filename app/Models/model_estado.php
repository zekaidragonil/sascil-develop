<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_estado extends Model
{
    use HasFactory;
    protected $table='estado';
    protected $primaryKey='id';
    
    public function municipio ()
    {
        return $this->hasMany('App\model_municipio');
    }
    public static function estado()
    {
        $estado = DB::table('estado')->select('id','estado')->get();
        return $estado;
    }
}
