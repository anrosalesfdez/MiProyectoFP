<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividad extends Model
{
    protected $table ='actividades';

    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'titulo',
        'descripcion',
        'impuesto',
        'serie',
        'impuesto_liquidables_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relación de actividad con productos. 
     */
     public function productos(){
        return $this->hasMany('App\Producto', 'actividades_id');
    }


    /**
     * Relación de actividad con emisor. 
     */
     public function emisores(){
        return $this->belongsToMany('App\Emisor')
                    ->using('App\EmisorActividad');
    }

    /**
     * Relación de actividad con emisor. 
     */
     public function users(){
        return $this->belongsToMany('App\User')
                    ->using('App\EmisorActividad');
    }

    /**
     * Relación de actividad con impuestos. 
     */
     public function impuestos(){
        return $this->belongsTo('App\ImpuestoLiquidable');
    }
}
