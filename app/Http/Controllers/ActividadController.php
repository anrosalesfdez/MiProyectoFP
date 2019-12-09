<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\EmisorActividad;

class ActividadController extends Controller
{
    
    /**
     * Send a listing of the resource.
     */
    public function get(){
        
        return Actividad::get();
        
    }

    /**
     * El emisor tiene actividades a través de emisores_facturas
     */
     public function getEmisor(){
        //1º conseguimos emisor id
        $emisor = auth()->user()->emisor;
        //una vez conocemos emisor id, en modelo emisor hay método para obtener actividades
        $actividades = $emisor->actividades;
        
    }
}
