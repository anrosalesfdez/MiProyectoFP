<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCabecera;


class FacturaCabeceraController extends Controller
{
    //recoge todos los registros no eliminados de la BD y los envía a la vista
    public function getFacturas(){
        
        $facturas = FacturaCabecera::get();
        
        return view('facturas/listar', ['facturas'=> $facturas]); //el helper view() permite enviar variables a blade
    }    

    //get last record
    public function getLast(){
        
        return FacturaCabecera::latest('created_at')->first();
        // $fac =  FacturaCabecera::withTrashed()->where('created_at', max('created_at'))->get();
        // dd($fac);
    }

    // Muestra la vista para crear nuevo cliente.
    //Envía dato OLD a la vista en caso de que el envío del form hay dado error en el server.
    //Laravel will check for errors in the session data, and automatically bind them to the view
    public function create() {

        return view('facturas/crear', ['olds' => json_encode(old())]);
    }
}
