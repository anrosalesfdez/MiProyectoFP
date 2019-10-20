<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    // Muestra vista de clientes
    public function vistarClientes(){
        
        return view('clientes/listar'); //esta  vista tiene vue component <clientes>
    }

    // Show the form for creating a new resource.
    public function vistaCrear() {

        return view('clientes/crear');
    }

    // public function getClientesNonTrashed(){
    //     $clientes = Cliente::orderBy('razon_social', 'ASC')->get();

    //     return $clientes;
    // }
    //Recoge todos los clientes de la BD.
    public function getClientesNonTrashed(Request $request){
        $ascending = $request->input("ascending") == 1 ? 'ASC' : 'DESC';
        $query = json_decode($request->input("query"));
        $clientes = Cliente::get();
        $count = $clientes->count();
        $order = $request->input("orderBy") ? $request->input("orderBy") : 'created_at';
        $clientes = Cliente::orderBy($order, $ascending);
        $count = $clientes->count();
        $clientes = $clientes->limit($request->input("limit"))->skip($request->input("limit") * ($request->input("page")-1))->get();
        
        return response(["count" => $count, "data" => $clientes]);
    }

    // Recoge un cliente de la BD.
    public function getCliente($id){

        $cliente = Cliente::findOrFail($id);

        return view('clientes/ver', ['cliente'=> $cliente]);
    } 

    // Store a newly created resource in storage.
    public function store(Request $request) {

        $cliente = Cliente::where('nif', $request->nif)->first();

        if($cliente === null){
            $nuevoCliente = Cliente::create($request->all());
            return response(['error' => false, 'message' => 'cliente creado OK']);

        }else{
            return response(['error' => true, 'message' => 'cliente ya existe']);
        }
    }

    // Muestra vista de detalle
    public function vistaEditar($id){

        $editadoCliente = Cliente::findOrFail($id); //JSON

        if($editadoCliente){
            return view('clientes/editar', ['editadocliente' => $editadoCliente]);
            //el helper view() permite enviar variables a blade. Aquí envía el objeto editadocliente
        }

    }

    // Update the specified resource in storage.
    public function update(Cliente $cliente) {
        
        $cliente->update(request()->all()); //ya hace findOrFail por detrás

        return redirect('/clientes/listar');
    }

    // Remove the specified resource from storage.
    public function destroy($id) {

        $cliente = Cliente::findOrFail($id);

        $cliente->delete(); //soft delete
    }
}
