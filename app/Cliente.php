<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use SoftDeletes;
    
    //those fields which can be created/ filled by mass-assignment by use of fillable.
    protected $fillable = [
        'id',
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
    protected $dates = ['deleted_at'];

}
