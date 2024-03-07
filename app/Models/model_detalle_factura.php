<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_detalle_factura extends Model
{
    use HasFactory;
    protected $table='detalle_factura';
    protected $primaryKey='id';
    public function factura()
    {
        return $this->BelongsTo('App\model_factura');
    }
}
