<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_avance extends Model
{
    use HasFactory;
    protected $table ='avance';
    protected $primaryKey = 'id';
    
    public function instrumento_legal()
    {
        return $this->hasMany('App\model_instrumento_legal');
    }
}
