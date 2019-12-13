<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCabecera;
use App\FacturaLinea;
use App\ImpuestoFacturacion;
use Illuminate\Support\Facades\DB;


class FacturaCabeceraController extends Controller
{

    //RECOGE TODAS LAS FACTURAS DEL EMISOR
    public function getFacturas(){

        $emisor = auth()->user()->emisor->first();
        $facturas = $emisor->cabeceras()->withTrashed()->get();
        // $facturas = $emisor->cabeceras;
        // dd($facturas);

        return $facturas;
        
    }
    
    //RECOGE TODAS LAS FACTURAS DEL EMISOR
    public function listarFacturas(){

        $facturas = $this->getFacturas();
        
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {
        // dd($request);
        // $this->validate($request, $this->rules(), $this->messages());
        $factura = FacturaCabecera::create($request->all());
        return response()->json(array('success' => true, 'last_insert_id' => $factura->id), 200);

    }

    
    public function getFactura($id) {

        $facturas = $this->getFacturas();
        $factura = $facturas->find($id);

        $lineas = FacturaLinea::where('factura_id', '=', $id)->get();

        return array($factura, $lineas);

    }

    /**
     * Muestra VISTA factura + lineas. El resultado ya viene filtrado por usuario.
     */
    public function verFactura($id) {

        list($factura, $lineas) = $this->getFactura($id);

        return view('facturas/ver', ['factura'=> $factura, 'lineas' => $lineas]);
    }


    /**
     * Ejecuta transacción: marca "anulada" y NUNCA SE ELIMINA!
     */
    public function delete($id){
        if($this->getFactura($id)[0]['anulada'] == 0){
        
            DB::transaction(function() use ($id) {
                    
                $this->getFactura($id)[0]->update(['anulada' => true]);
                
                list($factura, $lineas) = $this->getFactura($id);
                foreach ($lineas as $value) {
                    $value->update(['anulada' => true]);
                }
                $facturas = $this->getFacturas();
                return $facturas;
                
            });
        }
        
    }


    public function pagar($id){
        
        DB::transaction(function() use ($id) {
            // dd($this->getFactura($id));
            $this->getFactura($id)[0]->update(['pagada' => true]);
        });
        $facturas = $this->getFacturas();
        return $facturas;
    }


    public function presentar($id){
        
        DB::transaction(function() use ($id) {
            // dd($this->getFactura($id));
            $this->getFactura($id)[0]->update(['presentada' => true]);
        });
        $facturas = $this->getFacturas();
        return $facturas;
    }

    public function imprimir($id){
        $factura = $this->getFactura($id);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('facturas/impresion', ['factura' => $factura])->render());
        // $mpdf->WriteHTML(var_dump($factura));
        return $mpdf->Output();
    }
}
