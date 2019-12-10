<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FacturaLinea extends Model
{
    protected $table ='lineas';
    
    use SoftDeletes;

    protected $fillable = [
        'factura_id', //recoge id de la cabecera
        'ejercicio',
        'serie',
        'numero_fra',
        'numero',
        'producto_id',  //recoge id del producto
        'producto_nombre', 
        'producto_descripcion', 
        'producto_precio', 
        'producto_unidad', 
        'producto_act_impto', 
        'cantidad', 
        'impuesto', 
        'retencion', 
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * Relación de factura_cabeceras con factura_lineas. 
     */
     public function producto(){
        return $this->hasOne('App\Producto', 'producto_id');
    }

    /**
     * Relación de factura_lineas con actividad. 
     */
     public function cabecera(){
        return $this->belongsTo('App\FacturaCabeceras', 'factura_id');
    }

}
