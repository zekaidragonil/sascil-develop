<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_cargo extends Model
{
    use HasFactory;
    protected $table ="cargo";
    protected $primaryKey="id";

    public function instrumento_legal()
    {
        return $this->hasMany('App\model_usuario');
    }
    public static function cargo()
    {
        $cargo=DB::table('cargo')->select('id','cargo')->get();
        return $cargo;
    }
}
