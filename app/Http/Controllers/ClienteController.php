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
    public function clientesEditar($id){
        //  echo $id;
        $editadoCliente = Cliente::findOrFail($id); //JSON
        // echo $editadoCliente;
        // echo gettype($editadoCliente);
        if($editadoCliente){
            return view('/clientes_editar', ['id' => $editadoCliente->id, 'editadocliente' => $editadoCliente]);
            //el helper view() permite enviar variables a blade. Aquí envía el objeto editadocliente
            // return view('/clientes_editar'); //el helper view() permite enviar variables a blade. Aquí envía el objeto  editadocliente
            // return view('/clientes_editar')->with('editadoCliente', $editadoCliente); //va con objeto
        }

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
        $clienteEditado->razon_social = $request->input('razon_social');
        $clienteEditado->nif = $request->input('nif');
        $clienteEditado->niva = $request->input('niva');
        $clienteEditado->direccion = $request->input('direccion');
        $clienteEditado->pais = $request->input('pais');
        $clienteEditado->provincia = $request->input('provincia');
        $clienteEditado->cp = $request->input('cp');
        $clienteEditado->tlfn = $request->input('tlfn');
        $clienteEditado->email = $request->input('email');
        $clienteEditado->ambito_cl = $request->input('ambito_cl');
        $clienteEditado->tipo_cl = $request->input('tipo_cl');
        $clienteEditado->forma_pago = $request->input('forma_pago');
        $clienteEditado->dias_pago = $request->input('dias_pago');
        $clienteEditado->observ = $request->input('observ');
        $clienteEditado->save();

        return
        ClienteController::index();

        // redirect()->action('ClienteController@listarClientes');
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
