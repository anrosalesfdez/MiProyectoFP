<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaLinea extends Model
{
    protected $table ='factura_lineas';
    
    use SoftDeletes;

    protected $fillable = [
        'users_id', //recoge id del user
        'factura_cabeceras_id', //recoge id de la cabecera
        'fra_ejercicio',
        'fra_serie',
        'fra_numero',
        'numero',
        'serie',
        'linea_id', //recoge id del producto
        'linea_nombre', 
        'linea_descripcion', 
        'linea_precio', 
        'linea_unidad', 
        'linea_cantidad', 
        'linea_actividad_id', 
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * Relación de factura_cabeceras con factura_lineas. 
     */
     public function producto(){
        return $this->hasOne('App\Producto')
    }

    /**
     * Relación de factura_lineas con actividad. 
     */
     public function cabecera(){
        return $this->belongsTo('App\FacturaCabeceras')
    }

}
