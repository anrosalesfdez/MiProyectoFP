<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFactura extends Model
{
    protected $fillable = [
        'nif',
        'niva',
        'nombrefiscal',
        'nombrecomercial', 
        'email', 
        'telefono', 
        'direccionfiscal', 
        'cp', 
        'ciudad', 
        'pais'
    ];
    protected $dates = ['deleted_at'];

}
