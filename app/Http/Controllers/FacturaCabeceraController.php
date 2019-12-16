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
        $facturas = $emisor->cabeceras()->get();

        return $facturas;
        
    }

    //RECOGE CABECERA DETERMINADA
    public function getFactura($id) {
        $facturas = $this->getFacturas();
        $factura = $facturas->find($id);
        $lineas = FacturaLinea::where('factura_id', '=', $id)->get();
        return array($factura, $lineas);
    }

    //RECOGE última factura de serie VEND
    public function getLastVend(){
        $emisor = auth()->user()->emisor->first();
        $ultima = FacturaCabecera::latest('created_at')
                                ->where('emisores_id', '=', $emisor->id)
                                ->where('serie', '=', 'VEND')
                                ->first();
        return $ultima;
        
    }

    //RECOGE última factura de serie RECTIFICATIVA
    public function getLastRect(){
        $emisor = auth()->user()->emisor->first();
        $ultima = FacturaCabecera::latest('created_at')
                                ->where('emisores_id', '=', $emisor->id)
                                ->where('serie', '=', 'RECT')
                                ->first();
        return $ultima;
    }


    //RECOGE última factura de serie RECTIFICATIVA
    public function getLast(){
        $emisor = auth()->user()->emisor->first();
        $ultima = FacturaCabecera::latest('created_at')
                                ->where('emisores_id', '=', $emisor->id)
                                ->first();
        return $ultima;
    }
    
    

    //VISTA TODAS LAS FACTURAS DEL EMISOR
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
        $ultima = $this->getLastVend();
        // if($ultima['id'] == null)
        //     $ultima = 0;
        
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
        
        list($cabeceraVieja, $lineasViejas) = $this->getFactura($id);
        $ultima = $this->getLastRect();
        if($ultima == null)
            $ultima = 0;

        $ultimaGeneral = $this->getLast();
        
        //necesario que la factura no esté anulada ya
        if($cabeceraVieja['anulada'] == 0){
        
            DB::transaction(function() use ($id, $cabeceraVieja, $lineasViejas, $ultima, $ultimaGeneral) {
            //ponemos a anulada
                $cabeceraVieja->update(['anulada' => true]);
                foreach ($lineasViejas as $value) {
                    $value->update(['anulada' => true]);
                }

                //generamos clon en negativo
                // Forzamos la copia de this->object, si no
                // hará referencia al mismo objeto.
                $cabeceraAnulacion = clone $cabeceraVieja;
                //cambiamos datos necesarios en cabecera
                $cabeceraAnulacion['id'] =  $ultimaGeneral;
                $cabeceraAnulacion['created_at'] =  null;
                $cabeceraAnulacion['updated_at'] =  null;
                $cabeceraAnulacion['serie'] = 'RECT';
                $cabeceraAnulacion['numero'] = $ultima+1;
                $cabeceraAnulacion['fecha'] = date("Y-m-d");
                $cabeceraAnulacion['vencimiento'] = date("Y-m-d"); //revisar!
                $cabeceraAnulacion['base00'] = $cabeceraVieja['base00']*(-1);
                $cabeceraAnulacion['base04'] = $cabeceraVieja['base04']*(-1);
                $cabeceraAnulacion['base10'] = $cabeceraVieja['base10']*(-1);
                $cabeceraAnulacion['base21'] = $cabeceraVieja['base21']*(-1);
                $cabeceraAnulacion['impuesto'] = $cabeceraVieja['impuesto']*(-1);
                $cabeceraAnulacion['retencion'] = $cabeceraVieja['retencion']*(-1);
                $cabeceraAnulacion['gransubtotal'] = $cabeceraVieja['gransubtotal']*(-1);
                $cabeceraAnulacion['total'] = $cabeceraVieja['total']*(-1);
                // dd($cabeceraAnulacion);

                //clonamos líneas
                $lineasAnulacion = clone $lineasViejas;
                // dd($lineasAnulacion);
                //cambiamos datos en el foreach linea
                for($i=0; $i<count($lineasAnulacion); $i++){
                    $lineasAnulacion[$i]['id'] = null;
                    $lineasAnulacion[$i]['serie'] = 'RECT';
                    $lineasAnulacion[$i]['numero_fra'] = $cabeceraAnulacion['numero'];
                    $lineasAnulacion[$i]['producto_precio'] = $lineasViejas[$i]['producto_precio']*(-1);
                }
                // dd($lineasAnulacion);

                //grabamos la rectificativa
                $cabeceraAnulacion->save();
                // $cabeceraAnulacion = (array) $cabeceraAnulacion;
                // dd($cabeceraAnulacion);
                $lineasAnulacion = (array) $lineasAnulacion;
                // FacturaCabecera::create($cabeceraAnulacion);
                foreach ($lineasAnulacion as $value) {
                    FacturaLinea::create($value);
                }
                
                //enviamos datos
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
        // list($factura, $lineas) = $this->getFactura($id);
        // dd($factura);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->useSubstitutions = false;
        $mpdf->simpleTables = true;
        $mpdf->WriteHTML(view('facturas/impresion', ['factura' => $factura])->render());
        // $mpdf->WriteHTML(var_dump($factura));
        return $mpdf->Output();
    }

    public function imprimir2($id){
        $factura = $this->getFactura($id);
        return view('facturas/impresion2', ['factura' => $factura]);

    }

    public function graficoFras(){
        
        $data = [];
        $data[] = ['Fecha', 'Ingresos', 'Cobros'];

        $facturas = $this->getFacturas();
        foreach ($facturas as $key => $value) {
            $data[] = [
                        date("Y", strtotime($value->fecha)),
                        floatval($value->total),
                        floatval($value->total)
                    ];
        }

        return response($data);

    }

    public function topClientesChart(Request $request){
        $clientes = Auth::user()->emisores->facturas->clientes->get()->sortByDesc("total")->values()->all();
        $response = [["Cliente", "ingresos"]];
        $resto = ["Resto de clientes", 0];
        foreach ($clientes as $key => $s) {
            if($key < 5){
                $response[] = [
                    $s->razon_social,
                    $s->ingresos
                ];
            }else{
                $resto[1] += $s->ingresos;
            }
            
        }
        $response[] = $resto;
        return response($response);
    }
}
