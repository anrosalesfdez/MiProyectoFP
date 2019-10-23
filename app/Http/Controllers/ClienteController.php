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

    //recoge todos los clientes no eliminados de la BD
    public function getClientesNonTrashed(){
        $clientes = Cliente::get();
        return view('clientes/listar', ['clientes'=> $clientes]);
    }    

    // Recoge un cliente de la BD
    public function getCliente($id){

        $cliente = Cliente::findOrFail($id);

        return view('clientes/ver', ['cliente'=> $cliente]);
    } 

    // Show the form for creating a new resource.
    public function create() {

        return view('clientes/crear');
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {

        //validar 
        $messages = [
            'razon_social.required' => 'Es necesario introducir razón social.',
            'razon_social.max' => 'La razon social no puede superar los 50 caracteres',
            'nif.required' => 'Es necesario introducir NIF.',
            'nif.unique' => 'Cliente ya existe.',
            'ambito_cl.required' => 'Es necesario introducir un ámbito para el cliente.',
            'tipo_cl.required' => 'Es necesario introducir un ámbito para el cliente.',
            'email.xxxx' => 'Email mal formado.'
        ];
        $rules = [
            //need to mark your "optional" request fields as nullable 
            'razon_social' => 'bail|required|max:50', //bail = stop if first validation fails
            'nif' => 'bail|required|unique:clientes',
            'ambito_cl' => 'bail|required',
            'tipo_cl' => 'bail|required',
            'email' => 'nullable|email:rfc,dns'
        ];
        $this->validate($request, $rules, $messages);
        //Laravel will check for errors in the session data, and automatically bind them to the view
        // if they are available
        $nuevoCliente = Cliente::create($request->all());

        // return redirect('/clientes/listar');
        if($nuevoCliente){
            return redirect('/clientes/listar');
        }else{
            return var_dump($errors);
        }

    }

    // Muestra vista de detalle
    public function vistaEditar($id){

        $editadoCliente = Cliente::findOrFail($id); //JSON

        if($editadoCliente){
            // var_dump($editadoCliente);
            return view('clientes/editar', ['editadocliente' => $editadoCliente]);
            //el helper view() permite enviar variables a blade. Aquí envía el objeto editadocliente
        }

    }

    // Update the specified resource in storage.
    public function update(Cliente $cliente) {

        //validar 
        $messages = [
            'razon_social.required' => 'Es necesario introducir razón social.',
            'razon_social.max' => 'La razon social no puede superar los 50 caracteres',
            'ambito_cl.required' => 'Es necesario introducir un ámbito para el cliente.',
            'tipo_cl.required' => 'Es necesario introducir un ámbito para el cliente.',
            'email.xxxx' => 'Email mal formado.'
        ];
        $rules = [
            //need to mark your "optional" request fields as nullable 
            'razon_social' => 'bail|required|max:50', //bail = stop if first validation fails
            'ambito_cl' => 'bail|required',
            'tipo_cl' => 'bail|required',
            'email' => 'nullable|email:rfc,dns'
        ];
        $this->validate($request, $rules, $messages);
        //Laravel will check for errors in the session data, and automatically bind them to the view
        // if they are available
        
        $cliente->update(request()->all()); //ya hace findOrFail por detrás

        return redirect('/clientes/listar');
    }

    // Remove the specified resource from storage.
    public function destroy($id) {

        $cliente = Cliente::findOrFail($id);

        $cliente->delete(); //soft delete
    }
}
