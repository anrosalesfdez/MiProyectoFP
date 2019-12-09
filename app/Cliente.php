<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    protected $table ='clientes';

    use SoftDeletes;
    
    //those fields which can be created/ filled by mass-assignment by use of fillable.
    protected $fillable = [
        'id',
        'users_id',
        'razon_social',
        'nif',
        'niva',
        'direccion',
        'provincia',
        'pais',
        'cp',
        'telefono',
        'email',
        'ambito',
        'tipo',
        'forma_pago',
        'dias_pago',
        'observaciones'

    ];

    protected $dates = ['deleted_at'];

    // protected $primaryKey = array('id', 'users_id');

    /**
     * Relación de cliente con user. 
     */
     public function users(){
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * Relación de cliente con factura. 
     */
     public function facturas(){
        return $this->hasMany('App\FacturaCabecera');
    }

    //PARA RELLENAR CAMPO USERS_ID
    // public static function boot() {
    //     parent::boot();
    //     parent::observe(new IdObserver);  //You may register an observer instance using the observe method
    // }

    public static  function boot()
{
    parent::boot();
    // it will automatically add authenticate user to created_by column of selected model 
    static::creating(function ($model){
        $model->users_id = auth()->user()->id;
    });
}
}
