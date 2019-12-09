<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellido1', 
        'apellido2', 
        'telefono', 
        'fecha_nacimiento', 
        'nif',
        'direccion', 
        'cp', 
        'provincia', 
        'pais'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación de user con emisor.
     */
     public function emisor(){
         return $this->hasOne('App\Emisor', 'users_id');
     }

     /**
     * Relación de user con clientes. 
     */
     public function clientes(){
        return $this->hasMany('App\Cliente', 'users_id');
    }

    /**
     * Relación de user con productos. 
     */
     public function productos(){
        return $this->hasMany('App\Producto', 'users_id');
    }

    /**
     * Relación INDIRECT a través de tabla pivot. el modelo emisor no tiene actividades en tabla, pero si a traves de la tabla emisores_actividades
     */
     public function actividades(){
        return $this->hasManyThrough('App\Actividad')
                    ->using('App\EmisorActividad');
    }
}
