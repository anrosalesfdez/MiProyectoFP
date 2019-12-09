<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCabecera;
use App\ImpuestoFacturacion;


class FacturaCabeceraController extends Controller
{

    //RECOGE TODAS LAS FACTURAS DEL EMISOR
    public function getFacturas(){

        $emisor = auth()->user()->emisor->first();
        $facturas = $emisor->cabeceras;
        
        return view('facturas/listar', ['facturas'=> $facturas]); //el helper view() permite enviar variables a blade
    }    


    //Envía VISTA
    //Envía dato OLD a la vista en caso de que el envío del form hay dado error en el server.
    //Laravel will check for errors in the session data, and automatically bind them to the view
    public function create() {

        $emisor = auth()->user()->emisor->first();
        $clientes = auth()->user()->clientes;
        $productos = auth()->user()->productos;
        // dd($productos);
        $ultima = FacturaCabecera::latest('created_at')
                                ->where('emisores_id', '=', $emisor->id)->first();
        if($ultima == null)
            $ultima = 0;
        
        $impuestosfacturacion = ImpuestoFacturacion::get();
        // dd($impuestosfacturacion);

        return view('facturas/crear', ['olds' => json_encode(old()), 'emisor'=> $emisor, 'clientes'=>$clientes, 'productos'=>$productos, 'ultima'=>$ultima, 'impuestosfacturacion'=>$impuestosfacturacion]);
    }
}
