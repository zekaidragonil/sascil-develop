<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_financiamiento extends Model
{
    use HasFactory;
    protected $table='financiamiento';
    public function fuente_financiamiento()
    {
        return $this->BelongsTo('App\model_fuente_financiamiento');
    }
}