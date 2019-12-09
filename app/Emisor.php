<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Emisor extends Model
{
    protected $table ='emisores';
    
    use SoftDeletes;

    protected $fillable = [
        'users_id',
        'nif',
        'niva',
        'nombre_fiscal',
        'nombre_comercial', 
        'direccion_fiscal', 
        'direccion_comercial', 
        'cp_fiscal', 
        'cp_comercial', 
        'provincia_fiscal', 
        'provincia_comercial', 
        'pais_fiscal',
        'pais_comercial',
        'email', 
        'telefono'
    ];
    protected $dates = ['deleted_at'];


    /**
     * 1 emisor pertenece a un único usuario 
     */
     public function user(){
        return $this->belongsTo('App\User', 'users_id'); //users_id es la FK en tabla emisores
    }

    /**
     * 1 emisor tiene muchas cabeceras de factura
     */
     public function cabeceras(){
        return $this->hasMany('App\FacturaCabecera', 'emisores_id'); // emisores_id es la FK en tabla factura_cabeceras
    }

    /**
     * Relación INDIRECT a través de tabla pivot. el modelo emisor no tiene actividades en tabla, pero si a traves de la tabla emisores_actividades
     */
    //  public function actividades(){
    //     return $this->hasManyThrough(
    //                     'App\Actividad', //tabla final
    //                     'App\EmisorActividad', //tabla a través de la que accedo
    //                     'actividades_id',
    //                     'id');
    // }
    public function actividades(){
        return $this->belongsToMany('App\Actividad')
                    ->using('App\EmisorActividad');
    }
    //select a.codigo, ea.emisores_id from actividades a inner join emisores_actividades ea on ea.actividades_id = a.id and ea.emisores_id = '1'

}
