<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_adendum extends Model
{
    use HasFactory;
    protected $table='adendum';
    protected $primaryKey='id';
    public function instrumento_legal()
    {
        return $this->belongsTo('App\model_instrumento_legal');
    }
}
