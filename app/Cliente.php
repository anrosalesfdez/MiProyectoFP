<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //those fields which can be created/ filled by mass-assignment by use of fillable.
    protected $fillable = [
        'razon_social',
        'nif',
        'niva',
        'direccion',
        'provincia',
        'pais',
        'cp',
        'tlfn',
        'email',
        'ambito_cl',
        'tipo_cl',
        'forma_pago',
        'dias_pago',
        'observ'
    ];

}
