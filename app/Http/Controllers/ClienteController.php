<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////     views     //////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Muestra vista de clientes
     * 
     * @return view
     */
    public function listarClientes(){
        return view('clientes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function clientesNuevo() {
        return view('clientes_nuevo');
    }

    /**
     * Muestra vista de detalle
     * 
     * @return view
     */
    public function clientesEditar($cliente){
        $clienteEditar = Cliente::findOrFail($cliente.id);
        return view('clientes_editar')->with(compact('clienteEditar'));
        //FIXME:--- no trae datos desde clientes.vue
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////     consultas bd      //////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    //get
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //recogemos todos los clientes
        $clientes = Cliente::orderBy('razon_social', 'ASC')->get();
        return $clientes;
    } 

    //post
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //registro
        $nuevoCliente = Cliente::create($request->all());
        return;
    }

    //put
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $clienteEditado = Cliente::findOrFail($id);
        $clienteEditado->nombre = $request->input('nombre');
        $clienteEditado->save();
        return;
    }

    //delete
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //buscamos el cliente con el id pasado por parametro y eliminamos
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    }
}
