<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImpuestoLiquidable extends Model
{
    protected $table ='impuesto_liquidables';

    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'valor',
        'descripcion',
    ];

    protected $dates = ['deleted_at'];


    /**
     * Relación de user con actividades. 
     */
     public function actividades(){
        return $this->hasMany('App\Actividad')
    }
}
