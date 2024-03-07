<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_perfil extends Model
{
    use HasFactory;
    protected $table="perfil";

    public function usuario()
    {
        return $this->hasMany('App\model_usuario');
    }
    public static function perfil()
    {
        $perfil=DB::table('perfil')->select('id','nombre_perfil')->get();
        return $perfil;
    }
}
