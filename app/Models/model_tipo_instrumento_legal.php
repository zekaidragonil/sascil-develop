<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_tipo_instrumento_legal extends Model
{
    use HasFactory;
    protected $table='tipo_instrumento_legal';
    protected $primaryKey='id';

    public function instrumento_legal()
    {
        return $this->BelongsTo('App\model_instrumento_legal');
    }
}
