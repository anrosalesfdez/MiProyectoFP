<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FacturaCabecera extends Model
{
    protected $table ='factura_cabeceras';
    
    use SoftDeletes;

    protected $fillable = [
        'users_id',
        'emisores_id',
        'clientes_id',
        'ejercicio',
        'serie',
        'numero',
        'fecha', 
        'vencimiento', 
        'gransubtotal', 
        'base21', 
        'base10', 
        'base04', 
        'base00', 
        'total',
        'observaciones',
        'emi_nif', 
        'emi_niva', 
        'emi_nombre_fiscal', 
        'emi_nombre_comercial', 
        'emi_direccion_fiscal', 
        'emi_direccion_comercial', 
        'emi_cp_fiscal', 
        'emi_cp_comercial', 
        'emi_provincia_fiscal', 
        'emi_provincia_comercial', 
        'emi_pais_fiscal', 
        'emi_pais_comercial', 
        'emi_telefono', 
        'emi_email', 
        'cli_razon_social', 
        'cli_nif', 
        'cli_niva', 
        'cli_direccion',
        'cli_provincia',
        'cli_pais',
        'cli_cp',
        'cli_telefono',
        'cli_email',
        'cli_ambito',
        'cli_tipo',
        'cli_forma_pago',
        'cli_dias_pago',
        'cli_moneda',
        'anulada',
        'pagada',
        'presentada'
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * Relación de factura_cabeceras con factura_lineas. 
     */
     public function lineas(){
        return $this->hasMany('App\FacturaLineas');
    }

    /**
     * Relación de user con user. 
     */
     public function emisor(){
        return $this->hasOne('App\Emisor', 'emisores_id');
    }

    /**
     * Relación de user con user. 
     */
     public function cliente(){
        return $this->hasOne('App\Cliente', 'clientes_id');
    }

    /**
     * Relación de user con user. 
     */
     public function users(){
        return $this->hasOne('App\User', 'users_id');
    }

}
