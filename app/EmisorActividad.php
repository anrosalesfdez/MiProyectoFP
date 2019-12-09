<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class EmisorActividad extends Pivot
{
    protected $table ='emisores_actividades';
    
    use SoftDeletes;

    protected $fillable = [
        'users_id',
        'emisores_id',
        'actividades_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * 
     */
     public function actividades(){
        return $this->hasOne('App\Actividad');
    }

    /**
     *  
     */
     public function emisores(){
        return $this->belongsTo('App\Emisor');
    }

    /**
     *
     */
     public function users(){
        return $this->belongsTo('App\User');
    }
}
