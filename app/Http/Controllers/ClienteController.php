<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Muestra vista de clientes
     */
    public function vistarClientes(){
        return view('clientes/clientes'); //esta  vista tiene vue component <clientes>
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return view
     */
    public function vistarNuevo() {
        return view('clientes/clientes_nuevo');
    }

    /**
     * Recoge todos los clientes de la BD.
     *
     * @return Cliente
     */
    public function getClientes(){
        //recogemos todos los clientes
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        return $clientes;
    } 

    /**
     * Recoge un cliente de la BD.
     *
     * @return Cliente
     */
    public function getCliente($id){
        //recogemos todos los clientes
        $cliente = Cliente::findOrFail($id);
        return view('clientes/cliente_detalle', ['cliente'=> $cliente]);
    } 

    public function checkNif($nif){
        if(Cliente::where('nif', $nif)->first()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $nuevoCliente = Cliente::create($request->all());
        return;

        
    }

    /**
     * Muestra vista de detalle
     * 
     * @return view
     */
    public function vistarEditar($id){
        //  echo $id;
        $editadoCliente = Cliente::findOrFail($id); //JSON
        // echo $editadoCliente;
        // echo gettype($editadoCliente);
        if($editadoCliente){
            return view('clientes/clientes_editar', ['editadocliente' => $editadoCliente, 'token' => csrf_field()]);
            //el helper view() permite enviar variables a blade. Aquí envía el objeto editadocliente
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        
        $cliente->update($request()->all());
        // return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //buscamos el cliente con el id pasado por parametro y eliminamos
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    }
}
